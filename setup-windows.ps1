$ErrorActionPreference = 'Stop'
Write-Host "DevPilot AI setup" -ForegroundColor Cyan
if (-not (Get-Command php -ErrorAction SilentlyContinue)) { throw "PHP is not installed or not on PATH." }
if (-not (Get-Command composer -ErrorAction SilentlyContinue)) { throw "Composer is not installed or not on PATH. Install Composer, reopen PowerShell, then rerun." }
if (-not (Get-Command npm -ErrorAction SilentlyContinue)) { throw "Node.js/npm is not installed or not on PATH." }
if (-not (Test-Path .env)) { Copy-Item .env.example .env }
if (-not (Test-Path database/database.sqlite)) { New-Item database/database.sqlite -ItemType File | Out-Null }
composer install
php artisan key:generate
php artisan migrate
npm install
npm run build
Write-Host "Setup complete. Run php artisan serve and npm run dev in separate terminals." -ForegroundColor Green
