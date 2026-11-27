/**
 * UPTD PP REHSOS — eksportir statis untuk Vercel.
 * Jalankan di root proyek Laravel: node export-static.mjs
 * Laravel harus sedang berjalan di http://127.0.0.1:8000 (php artisan serve).
 * Tidak mengubah file Laravel, tidak memerlukan database tambahan atau paket npm.
 */
import { existsSync, mkdirSync, readdirSync, copyFileSync, readFileSync, rmSync, renameSync, statSync, writeFileSync } from 'node:fs';
import { join, dirname, resolve, relative, extname, sep } from 'node:path';
import { fileURLToPath } from 'node:url';

const projectRoot = dirname(fileURLToPath(import.meta.url));
const baseUrl = (process.env.LARAVEL_URL || 'http://127.0.0.1:8000').replace(/\/+$/, '');
const origin = new URL(baseUrl).origin;
const publicDir = join(projectRoot, 'public');
const finalDir = join(projectRoot, 'vercel-static');
const tempDir = join(projectRoot, 'vercel-static.__tmp');

const pages = [
  { name: 'Beranda', path: '/', output: 'index.html' },
  { name: 'Profil', path: '/profil', output: 'profil/index.html' },
  { name: 'Layanan', path: '/layanan', output: 'layanan/index.html' },
  { name: 'Informasi', path: '/informasi', output: 'informasi/index.html' },
  { name: 'Fasilitas', path: '/fasilitas', output: 'fasilitas/index.html' },
  { name: 'Kontak', path: '/kontak', output: 'kontak/index.html' },
];

// Salin aset publik yang diperlukan website; jangan publikasikan file PHP, .env,
// folder storage, vendor, maupun file backend dari direktori public.
const assetDirectories = ['css', 'js', 'images', 'dokumen', 'build', 'fonts', 'assets', 'media', 'videos'];
const allowedExtensions = new Set([
  '.css', '.js', '.mjs', '.png', '.jpg', '.jpeg', '.gif', '.webp', '.svg',
  '.ico', '.avif', '.pdf', '.woff', '.woff2', '.ttf', '.otf', '.webmanifest',
  '.txt', '.xml', '.mp4', '.webm', '.json', '.map',
]);

function copyPublicFile(source, target) {
  if (!allowedExtensions.has(extname(source).toLowerCase())) return 0;
  mkdirSync(dirname(target), { recursive: true });
  copyFileSync(source, target);
  return 1;
}

function copyFolder(sourceDir, targetDir) {
  let copied = 0;
  for (const entry of readdirSync(sourceDir, { withFileTypes: true })) {
    if (entry.name.startsWith('.')) continue;
    const source = join(sourceDir, entry.name);
    const target = join(targetDir, entry.name);
    // Jangan ikuti symlink (mis. public/storage milik Laravel).
    if (entry.isSymbolicLink()) continue;
    if (entry.isDirectory()) copied += copyFolder(source, target);
    else if (entry.isFile()) copied += copyPublicFile(source, target);
  }
  return copied;
}

function htmlForStatic(html) {
  // Laravel menghasilkan URL seperti http://127.0.0.1:8000/images/logo.png.
  // Ubah menjadi /images/logo.png agar bekerja pada domain Vercel.
  // Bentuk JSON di Blade dapat menjadi http:\/\/127.0.0.1:8000\/...
  const variants = [origin, origin.replaceAll('/', '\\/')];
  for (const variant of variants) html = html.split(variant).join('');
  return html;
}

function inspectAssets() {
  let missing = 0;
  for (const page of pages) {
    const html = readFileSync(join(tempDir, page.output), 'utf8');
    const matches = html.matchAll(/(?:src|href)\s*=\s*["'](\/(?:images|css|js|dokumen|build|fonts|assets|media|videos)\/[^"']+)["']/gi);
    for (const match of matches) {
      const url = match[1].split(/[?#]/)[0];
      let relativePath;
      try { relativePath = decodeURIComponent(url).replace(/^\/+/, ''); }
      catch { relativePath = url.replace(/^\/+/, ''); }
      const file = resolve(tempDir, relativePath);
      if (!file.startsWith(tempDir + sep) || !existsSync(file)) {
        if (missing < 12) console.warn(`  ⚠ Aset belum ditemukan (${page.name}): ${url}`);
        missing++;
      }
    }
  }
  if (missing) console.warn(`  ⚠ Total referensi aset yang perlu dicek: ${missing}`);
}

async function main() {
  if (!existsSync(join(projectRoot, 'artisan')) || !existsSync(publicDir)) {
    throw new Error('Simpan export-static.mjs di folder utama Laravel, sejajar dengan file artisan.');
  }
  if (existsSync(join(publicDir, 'hot'))) {
    throw new Error('Vite dev sedang aktif (public/hot). Hentikan npm run dev, lalu jalankan npm run build sebelum ekspor.');
  }
  if (existsSync(tempDir)) rmSync(tempDir, { recursive: true, force: true });
  mkdirSync(tempDir, { recursive: true });
  console.log(`Membaca enam halaman dari ${baseUrl} ...`);

  try {
    for (const page of pages) {
      let response;
      try {
        response = await fetch(new URL(page.path, baseUrl), {
          headers: { Accept: 'text/html' },
          signal: AbortSignal.timeout(30000),
        });
      } catch (error) {
        throw new Error(`Tidak bisa membuka ${page.path}. Pastikan terminal pertama menjalankan php artisan serve. Detail: ${error.message}`);
      }
      if (!response.ok) {
        throw new Error(`Halaman ${page.path} menghasilkan HTTP ${response.status}. Perbaiki dahulu kesalahan di Laravel lokal.`);
      }
      let html = htmlForStatic(await response.text());
      if (!/<html[\s>]/i.test(html) || !html.includes('UPTD PP REHSOS')) {
        throw new Error(`Respons ${page.path} bukan halaman website yang diharapkan. Periksa URL Laravel lokal.`);
      }
      const destination = join(tempDir, page.output);
      mkdirSync(dirname(destination), { recursive: true });
      writeFileSync(destination, html, 'utf8');
      console.log(`  ✓ ${page.name.padEnd(10)} → ${page.output}`);
    }

    let totalAssets = 0;
    for (const folder of assetDirectories) {
      const source = join(publicDir, folder);
      if (!existsSync(source) || !statSync(source).isDirectory()) continue;
      totalAssets += copyFolder(source, join(tempDir, folder));
    }
    // Logo/favicon/robots di root public, tetapi jangan salin public/index.php.
    for (const entry of readdirSync(publicDir, { withFileTypes: true })) {
      if (entry.isFile()) totalAssets += copyPublicFile(join(publicDir, entry.name), join(tempDir, entry.name));
    }
    console.log(`  ✓ ${totalAssets} file aset publik tersalin`);
    inspectAssets();

    if (existsSync(finalDir)) rmSync(finalDir, { recursive: true, force: true });
    renameSync(tempDir, finalDir);
    console.log('\nSELESAI! Folder vercel-static siap dikirim ke GitHub.');
    console.log('Tinjau dokumen di vercel-static/dokumen sebelum publikasi: semua file di sana dapat diakses publik.');
    console.log('Jalankan: git add export-static.mjs vercel.json vercel-static');
    console.log('Lanjutkan: git commit -m "Deploy website statis UPTD PP REHSOS"');
    console.log('Lalu:      git push origin main');
  } catch (error) {
    if (existsSync(tempDir)) rmSync(tempDir, { recursive: true, force: true });
    throw error;
  }
}

main().catch(error => {
  console.error(`\nGAGAL: ${error.message}`);
  process.exitCode = 1;
});
