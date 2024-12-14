# PHP Boilerplate by Studio Toffolo

A minimal vanilla PHP boilerplate designed to help you quickly set up a simple app. Made by Studio Toffolo and based on OpenTicket, this boilerplate provides the essentials to get started without the complexity of a framework. Perfect for rapid prototyping or lightweight applications.

## 🚀 Features
- **Vanilla PHP:** No dependencies or frameworks, so you can dive straight into coding.
- **Quick Start:** Pre-configured for ease of use with XAMPP or a live server.
- **Dynamic Pages:** Add pages effortlessly, with automatic menu updates.
- **Customizable:** Tweak everything, from login screens to the core functionality.

> **Disclaimer:** This is a basic boilerplate. You are responsible for implementing proper error handling, security measures, and testing before using this in production.

---

## 🛠️ Getting Started

### 1. Requirements
- PHP 7.4 or higher
- A local server environment (e.g., XAMPP) or a live production server

### 2. Setting Up Locally
1. Download and install [XAMPP](https://www.apachefriends.org/index.html). Follow the installation instructions for your operating system.
2. Place the boilerplate app folder into the `/htdocs` directory of your XAMPP installation.
3. Start the XAMPP control panel and enable **Apache** and **MySQL**.
4. Configure your `.env` file as described below.
5. Open your browser and navigate to `http://localhost/[folder-name]`.

### 3. Setting Up on a Live Server
1. Upload the boilerplate files to your server using FTP or a file manager.
2. Ensure your server meets the PHP version requirement.
3. Configure your `.env` file as described below.

---

## 🔑 OAuth Configuration
The boilerplate app uses the Openticket OAuth, so you'll need to create a new client.
1. Navigate to the **Dashboard**.
2. Create a new OAuth client.
   - Use the URL you plan to use, such as `http://localhost/openticket-boilerplate` or your live domain.
3. Note down the **Client ID** and **Client Secret** provided by your OAuth provider.
4. Open the `.env` file in the boilerplate directory and update the following:
   ```env
   OAUTH_CLIENT_ID=your-client-id
   OAUTH_CLIENT_SECRET=your-client-secret
   OAUTH_REDIRECT_URI=http://your-url-here
   ```
5. Save the changes. You should now be able to access your app, log in, and see the example pages.

---

## 📄 Adding Pages
Adding pages to your app is simple:
1. Create a new `.php` file in the `/pages` directory.
2. The file name will automatically be added to the menu (underscores `_` will be replaced with spaces).

For example, if you create a file called `new_feature.php`, it will appear in the menu as `New feature`.

This boilerplate comes with 4 example pages you can copy and modify to suit your needs.

---

## 🎨 Customization
Feel free to:
- Modify the login screen.
- Change styles or layouts.
- Add or remove functionality.

This boilerplate is a starting point, so make it your own and enjoy coding!

---

## 📝 License
This boilerplate is open-source and free to use. Contributions are welcome!
