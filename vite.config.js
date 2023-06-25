// Inspired by
// https://github.com/fgeierst/typo3-vite-demo/blob/master/packages/typo3_vite_demo/Resources/Private/JavaScript/vite.config.js

import { defineConfig } from 'vite'
import { svelte } from '@sveltejs/vite-plugin-svelte'
import webfontDownload from 'vite-plugin-webfont-dl'
import FullReload from 'vite-plugin-full-reload'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    svelte(),
    webfontDownload([
      'https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400&display=swap',
    ]),
    FullReload([
      'packages/svelte_demo/Resources/Private/Layouts/**/*',
      'packages/svelte_demo/Resources/Private/Templates/**/*',
      'packages/svelte_demo/Resources/Private/Partials/**/*',
    ]),
  ],
  server: {
    host: '0.0.0.0', // leave this unchanged for DDEV!
    port: 5173,
  },
  publicDir: false, // disable copy `public/` to outDir
  build: {
    // generate manifest.json in outDir
    manifest: true,
    rollupOptions: {
      input: 'packages/svelte_demo/Resources/Private/JavaScript/main.js',
    },
    outDir: 'packages/svelte_demo/Resources/Public/CompiledJavaScript',
  },
  css: {
    devSourcemap: true, // disabled by default because of performance reasons
  },
})
