#!/bin/bash

# Aguarda o MySQL estar pronto usando bash nativo
echo "Aguardando MySQL iniciar..."
MAX_ATTEMPTS=30
ATTEMPT=0

while [ $ATTEMPT -lt $MAX_ATTEMPTS ]; do
  if exec 3<>/dev/tcp/mysql/3306 2>/dev/null; then
    exec 3>&-
    echo "MySQL está pronto!"
    break
  fi
  ATTEMPT=$((ATTEMPT + 1))
  echo "Tentativa $ATTEMPT/$MAX_ATTEMPTS..."
  sleep 2
done

echo "Importando banco de dados..."

# Executa o script de importação
php /var/www/html/database/import.php

echo "Iniciando Apache..."

# Inicia o Apache em foreground
apache2-foreground
