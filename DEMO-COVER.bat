@echo off
REM Shortcut demo: tampilkan kode generator cover ke asesor
REM Dibuat untuk presentasi BNSP - BookStore

cd /d "%~dp0"

echo.
echo  ============================================
echo   DEMO: GENERATOR COVER BUKU
echo  ============================================
echo.
echo  Membuka VS Code di:
echo    tools\generate_covers.php  (baris 76 - word wrap)
echo.
echo  Membuka folder cover:
echo    storage\app\public\covers
echo.
echo  Tips:
echo    - Tekan Ctrl+G di VS Code untuk lompat ke baris
echo    - Baris 15-24 : palet warna per kategori
echo    - Baris 44-52 : kanvas 500x700
echo    - Baris 76-99 : pembungkus judul otomatis
echo    - Baris 94-98 : menengahkan teks
echo.
echo  ============================================
echo.

if not exist "tools\generate_covers.php" (
    echo  [GAGAL] File tidak ditemukan. Pastikan .bat ada di folder BookStore.
    pause
    exit /b 1
)

set "CODE=G:\Microsoft VS Code\bin\code.cmd"
if not exist "%CODE%" (
    set "CODE=code"
)

start "" "%CODE%" --reuse-window --goto "tools\generate_covers.php:76:1"
start "" explorer "storage\app\public\covers"

echo  VS Code dan folder cover sudah dibuka.
echo.
pause
