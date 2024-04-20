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
**XAMPP** : Ensure that xampp is intalled on localmachine  [download here](https://www.apachefriends.org/download.html)
- **Composer**: Installation instructions can be found [here](https://getcomposer.org/download/).
**Zip Extension**: enable(remove semicolon ";") extension=zip in the php.ini file , found in the xampp/php directory (e.g., `C:\xampp\php`).

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

3. **Run Composer Install**:
   - Execute the following command to install dependencies defined in `composer.json`:
     ```
     composer install
     ```

4. **Wait for Installation**:
   - Composer will download and install all required packages specified in `composer.json`.
   - Wait for the process to complete.

5. **Verify Installation**:
   - Once the installation is finished, check for any error messages in the terminal.
   - Verify that the `vendor` directory is created in your project directory
