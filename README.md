# Web-data-save-in-Google-Sheet-automation-
This project allows you to collect website contact form data
# Contact Form Integration (PHP + Google Sheets)

This project shows two setups:

1. **Single File (contact.php)** → HTML + PHP in one file.  
2. **Split Version** → `contact.html` (frontend) + `contact.php` (backend).  

Both store form submissions in:
- Local CSV file (`contacts.csv`)
- Google Sheet (via Apps Script API)

---

## Google Sheet Setup

1. Create a Google Sheet with columns: `Name`, `Email`, `Message`, `Timestamp`.
2. Go to **Extensions → Apps Script**.
3. Paste the provided script.
4. Deploy → Web App:
   - Execute as: Me
   - Who has access: Anyone
5. Copy the Web App URL.

---

## PHP Setup

1. Upload files to a PHP server (e.g., XAMPP, Hostinger, etc.).
2. Open `contact.php` and replace:
   ```php
   $googleAppUrl = "YOUR_GOOGLE_APP_SCRIPT_URL";
