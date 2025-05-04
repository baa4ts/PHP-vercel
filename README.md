# PHP en Vercel

Este repositorio es una plantilla para desplegar aplicaciones PHP en Vercel. Está basado en la versión más reciente del proyecto [vercel-community/php](https://github.com/vercel-community/php), concretamente en la versión `vercel-php@0.7.3`.

## Objetivo

El objetivo de este proyecto es simplificar el despliegue de aplicaciones PHP en Vercel.

> [!CAUTION]
> - El proyecto incluye únicamente las extensiones proporcionadas por el runtime de Vercel.  
> - No se deben usar extensiones adicionales, ya que el runtime no instala librerías extras.  
> - Solo se admiten librerías gestionadas con Composer para PHP.

## ¿Qué incluye?

- El template ya proporciona:
  - `vercel.json`: configuración básica para Vercel.
  - `.vercelignore`: para no subir al host archivos innecesarios.
  - `.gitignore`: para no subir archivos innecesarios a GitHub.
  - `docker-compose.yml`: entorno de desarrollo local (PHP + MySQL).  
    _Está configurado para que los valores de la base de datos sean constantes en tu máquina._
  - `api/Dockerfile`: configuración de PHP para recrear el entorno y runtime de Vercel.
  - `db/Dockerfile`: configuración básica para MySQL.
  - `api/index.php`: ejemplo de conexión sencilla a la base de datos local (recuerda cambiarla para producción).

## ¿Cómo usar?

1. Clona este repositorio:
   ```bash
   git clone https://github.com/tu-usuario/php-en-vercel.git```

2. Entra en la carpeta del proyecto:

   ```bash
   cd php-en-vercel
   ```
3. Construye las imágenes:

   ```bash
   docker compose build
   ```

   o bien constuir y ejecutar ala ves

   ```bash
   docker compose up --build
   ```
4. Inicia los contenedores:

   ```bash
   docker compose up
   ```

   o en modo detached:

   ```bash
   docker compose up -d
   ```

## Licencia

Este proyecto se distribuye bajo la licencia MIT.