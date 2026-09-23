$ErrorActionPreference = 'Stop'
Start-Process powershell -ArgumentList '-NoExit','-Command','php artisan serve'
Start-Process powershell -ArgumentList '-NoExit','-Command','npm run dev'
Start-Sleep -Seconds 2
Start-Process 'http://127.0.0.1:8000'
