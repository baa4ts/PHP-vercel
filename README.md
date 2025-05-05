# PHP en Vercel

Plantilla para desplegar aplicaciones PHP en Vercel, basada en la versión más reciente del proyecto [vercel-community/php](https://github.com/vercel-community/php), versión `vercel-php@0.7.3`.

---

## 🎯 Objetivo

Simplificar el despliegue de aplicaciones PHP en Vercel, ofreciendo una configuración lista tanto para producción como para desarrollo local.

> \[!CAUTION]
>
> * El proyecto incluye únicamente las extensiones proporcionadas por el runtime de Vercel.
> * No se deben usar extensiones adicionales, ya que el runtime no instala librerías extras.
> * Solo se admiten librerías gestionadas con Composer para PHP.

---

## 📦 ¿Qué incluye?

* **`vercel.json`**: configuración básica para Vercel.
* **`.vercelignore`**: archivos a excluir al desplegar en Vercel.
* **`.gitignore`**: archivos a excluir en Git.
* **`docker-compose.yml`**: entorno local (PHP + MySQL).

  > *Configurado para valores constantes de base de datos en tu máquina.*
* **`api/Dockerfile`**: reproduce el entorno y runtime de Vercel para PHP.
* **`db/Dockerfile`**: configuración básica para MySQL.
* **`api/index.php`**: ejemplo de conexión sencilla a la base de datos local (cámbiala para producción).

---


## 🔨 Librerias
 por defecto las librerias Redis, MongoDB, imap,  gRPC estan desactivadas, por motivos que demoran demasiado tiempo el instalado de las mismas

#### Para activarlas deveras ir al archivo 
   `./api/Dockerfile` 

   - Para habilitar IMAP descomentar la linea 46 y 47
   - Para habilitar Redis, MongoDB o gRPC descomentar `50` y `51`

---

## ⚙️ Extensiones en local

<details>
<summary>Ver estado y alternativas</summary>

| Extensión | Estado                         | ¿Deprecated? | Disponible vía Composer                                                 |
| --------- | ------------------------------ | ------------ | ----------------------------------------------------------------------- |
| `geoip`   | ❌ Eliminada desde PHP 8.0      | ✅ Sí         | ✅ Sí, usar [`geoip2/geoip2`](https://github.com/maxmind/GeoIP2-php)     |
| `pcntl`   | ✅ Disponible en Unix/Linux CLI | ❌ No         | ❌ No (parte del core en Unix)                                           |
| `xmlrpc`  | ❌ Eliminada desde PHP 8.1      | ✅ Sí         | ✅ Sí, usar [`phpxmlrpc/phpxmlrpc`](https://github.com/gggeek/phpxmlrpc) |

> **Recomendación:** Si utilizas alguna de estas librerías, instálalas con Composer.

</details>

---

## 📖 ¿Cómo usar?

<details>
<summary>1. Clonar el repositorio</summary>

```bash
git clone https://github.com/tu-usuario/php-en-vercel.git
cd php-en-vercel
```

</details>

<details>
<summary>2. Construir imágenes Docker</summary>

```bash
docker compose build
# O combinar build + up:
docker compose up --build
```

</details>

<details>
<summary>3. Iniciar contenedores</summary>

```bash
docker compose up         # modo interactivo
docker compose up -d      # modo detached
```

*Alternativamente, usa `docker compose up --build` para build + up en un solo paso.*

</details>

---

## 📦 Despliegue en Vercel

<details>
<summary>Paso a paso</summary>

1. Instala [Vercel CLI](https://vercel.com/docs/cli).
2. Autentícate:

   ```bash
   vercel login
   ```
3. Despliega:

   ```bash
   vercel
   ```
4. Sigue las indicaciones para asignar proyecto y dominio.

</details>

---

## ⚖️ Licencia

Este proyecto se distribuye bajo la licencia MIT. C
