## THINGS TO DO BEFORE INSTALLING COMPOSER PACKAGES:

This guide provides step-by-step instructions for installing Tesseract OCR on a Windows system and adding it to the system path.
## Installing Tesseract OCR on Windows

1. **Download Tesseract Installer**:
   - Go to the [Tesseract GitHub Releases page](https://github.com/UB-Mannheim/tesseract/wiki).
   - Download the latest installer for Windows (.exe format).

2. **Run Installer**:
   - Double-click the downloaded .exe file to run the installer.
   - Follow the installation instructions provided.

3. **Verify Installation**:
   - Navigate to the installation directory to ensure successful installation.

## Adding Tesseract to System Path

1. **Open System Properties**:
   - Right-click on `This PC` or `My Computer` and select `Properties`.
   - Click on `Advanced system settings` in the left sidebar.

2. **Open Environment Variables**:
   - In the System Properties window, click on `Environment Variables`.

3. **Edit System Variables**:
   - Under `System variables`, find and select the `Path` variable.
   - Click on `Edit`.

4. **Add Tesseract Path**:
   - Click on `New`.
   - Enter the path to Tesseract installation directory (e.g., `C:\Program Files\Tesseract-OCR`).
   - Click `OK` to close each window.

5. **Verify Path Addition**:
   - Open Command Prompt (cmd) and type `tesseract -v`.
   - Press Enter to execute the command.
   - If Tesseract is installed correctly, you should see version information printed.

# Installing Composer Dependencies Of The Project
This guide provides instructions for installing PHP dependencies using Composer.

## Prerequisites

Before proceeding, ensure that you have PHP and Composer installed on your system.

1. **XAMPP** :
   - Ensure that xampp is intalled on localmachine  [download here](https://www.apachefriends.org/download.html).

2. **Composer**:
   - Installation instructions can be found [here](https://getcomposer.org/download/).

4. **Add PHP to System Path**
   - Under `System variables`, find and select the `Path` variable.
   - Click on `Edit`.
   - add new path , the xamp/php directory (e,g. ``C:\xampp\php``)

3. **Enable Zip Extension**:
   - enable(remove semicolon ";") extension=zip in the php.ini file , found in the xampp/php directory (e.g., `C:\xampp\php`).

## Installation Steps

1. **Clone Repository**:
   - Clone the repository to your local machine using Git:
     ```
     git clone <repository_url>
     ```
   **OR**

     **Download The Zip File Of the Project Code Directly from Repository**:
     ```
     Code -> Download Zip File>
     ```

2. **Navigate to Project Directory**:
   - Open a terminal or command prompt.
   - Change directory to the root of your project where the `composer.json` file is located.

3. **Enable Zip extension**:
   - Go to your php.ini, usually located at the "C:\xampp\php\php.ini"
   - search(control + r) for "extension=zip", uncomment the semicolon before to enable it

4. **Run Composer Install**:
   - Execute the following command to install dependencies defined in `composer.json`:
     ```
     composer install
     ```

5. **Wait for Installation**:
   - Composer will download and install all required packages specified in `composer.json`.
   - Wait for the process to complete.

6. **Verify Installation**:
   - Once the installation is finished, check for any error messages in the terminal.
   - Verify that the `vendor` directory is created in your project directory

7. **Run Migrations**:
   - make an env file, modify the  database settings of the env file to match the credentials of your current mysql credentials, an env.example is included in the project directory for reference
   - click keys "control + p" and type database.php , same as the env file modify the mysql database config to match the credentials of your mysql database
   - Change directory to the project directory and type in the command line "php artisan migrate", you will be prompt to create the database and laravel will automatically migrate all tables to your mysql database
   - or you can choose to import the sql file included   in the mysql_database folder
