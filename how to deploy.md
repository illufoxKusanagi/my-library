# The Ultimate Guide: Deploying Laravel to InfinityFree 🚀☁️

InfinityFree provides excellent free hosting, but because it is **Shared Hosting**, you do not have access to a terminal (SSH). This means you cannot run commands like `php artisan migrate` or `composer install` directly on the server. 

To deploy successfully, you must prepare everything on your computer first, upload the finished product, and configure the database manually. Here is the comprehensive, step-by-step guide.

---

## Phase 1: Preparing Your App Locally (✅ ALREADY DONE FOR YOU)

*Note: I already ran all these commands in the background and generated `library_project_infinityfree.zip` for you! You can skip this phase and go straight to Phase 2. I left these steps here just in case you ever need to do it yourself in the future.*

Because the server has no terminal, you must compile your assets and dependencies locally.

1. **Clear all local caches:** Open your local terminal and run:
   ```bash
   php artisan optimize:clear
   ```
   *(This prevents your local file paths from being cached and breaking the server).*

2. **Install Production Dependencies:**
   ```bash
   composer install --optimize-autoloader --no-dev
   ```

3. **Build Frontend Assets:**
   ```bash
   npm install
   npm run build
   ```

4. **Package the Application into a Zip File:**
   You need to compress your project so it can be uploaded easily. **Do not include `.git` or `node_modules`**, as they are massive and unnecessary for production. 
   If you are on Linux/Mac, run this in your project root:
   ```bash
   zip -r laravel_deployment.zip . -x "node_modules/*" -x ".git/*"
   ```
   *(I have already created a file named `library_project_infinityfree.zip` for you in your folder!)*

---

## Phase 2: Setting up the InfinityFree Database

You cannot use `php artisan migrate` on InfinityFree, so you must export your local database and import it to their server.

1. **Create the Database:**
   - Log into your InfinityFree account and open the **Control Panel** (vPanel).
   - Scroll down to the **"Databases"** section and click **"MySQL Databases"**.
   - Create a new database (e.g., `library`).
   - *Note down your Database Name (e.g., `if0_345678_library`), Username (e.g., `if0_345678`), and Password (you can find the password in the client area).*

2. **Export your Local Database (✅ ALREADY DONE FOR YOU)**
   - I have already used a secure Docker container to export your TiDB database! You will find a file named `library_export.sql` in your `library_project` folder. You can skip this step!

3. **Import to InfinityFree:**
   - Go back to the InfinityFree Control Panel.
   - Click **"phpMyAdmin"**.
   - Select your new database on the left side.
   - Click the **"Import"** tab at the top, select your `.sql` file, and click **"Go"**.

---

## Phase 3: Uploading Your Files via FTP

**CRITICAL WARNING:** InfinityFree's "Online File Manager" has a strict 10MB limit for uploading `.zip` files. A Laravel project is usually around 30MB-50MB. **You MUST use an FTP client like FileZilla to upload your files.**

1. **Download and Install FileZilla** (It is free).
2. **Connect to your Server:**
   - Open your InfinityFree Client Area to find your FTP Details (Host, Username, Password).
   - Enter these into FileZilla and click **Quickconnect**.
3. **Upload the Files:**
   - On the right side of FileZilla (the Server), open the `htdocs` folder.
   - **Delete** the default files inside `htdocs` (like `index2.html`).
   - On the left side of FileZilla (Your Computer), extract your `library_project_infinityfree.zip` folder.
   - Select **ALL** the extracted files and folders (`app`, `public`, `vendor`, `.env`, etc.).
   - Drag and drop them directly into the `htdocs` folder on the right side.
   - *Note: This upload will take 10-20 minutes because Laravel has thousands of tiny files in the `vendor` folder. Let it finish completely!*

---

## Phase 4: The Secret Routing Trick (.htaccess)

By default, Laravel expects the server to point to the `public/` directory. InfinityFree forces the server to point to `htdocs/`. If you don't fix this, users will just see a list of your folders when they visit your site!

1. In FileZilla, look inside your `htdocs` folder on the server.
2. Find the file named `htdocs-htaccess.txt` (I generated this for you earlier).
3. Right-click it and choose **Rename**.
4. Rename it to exactly: `.htaccess` (Make sure it starts with a dot!).
   
*This file contains a magical script that invisibly forwards all visitors directly into the `public/` folder, securing your app!*

---

## Phase 5: Configuring the Server `.env`

Your application is uploaded, but it is still trying to connect to your local database!

1. In FileZilla, find the `.env` file inside your `htdocs` folder.
2. Right-click it and choose **"View/Edit"**.
3. Make the following crucial changes:

   ```env
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=http://your-infinityfree-domain.com

   DB_CONNECTION=mysql
   DB_HOST=sql123.epizy.com  <-- Replace with your InfinityFree MySQL Hostname
   DB_PORT=3306
   DB_DATABASE=if0_12345_library <-- Replace with your InfinityFree DB Name
   DB_USERNAME=if0_12345         <-- Replace with your InfinityFree DB Username
   DB_PASSWORD=your_password     <-- Replace with your InfinityFree DB Password
   ```
4. Save the file. FileZilla will ask if you want to upload the modified file back to the server. Click **Yes**.

---

## Phase 6: Fixing Storage Permissions (Optional but Recommended)

Because you cannot run `php artisan storage:link`, images uploaded to `storage/app/public` might not display correctly. 

Since you already uploaded the `public/storage` symlink folder via FTP, InfinityFree should natively resolve the symlink. However, if your book covers return a 404 error, you may need to manually move the contents of `storage/app/public/cover` directly into `public/storage/cover` using FileZilla.

---

### 🎉 You are Done!
Visit your InfinityFree URL in your browser. Your Laravel application is now fully deployed, secured, and connected to your cloud database!