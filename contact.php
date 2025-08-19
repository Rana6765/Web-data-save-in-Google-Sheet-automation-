<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Save to CSV
    $file = 'contacts.csv';
    $data = [$name, $email, $message, date('Y-m-d H:i:s')];
    $handle = fopen($file, 'a');
    fputcsv($handle, $data);
    fclose($handle);

    // Send to Google Sheets
    $googleAppUrl = "YOUR_GOOGLE_APP_SCRIPT_URL";
    $payload = json_encode(["name"=>$name, "email"=>$email, "message"=>$message]);

    $ch = curl_init($googleAppUrl);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($payload)
    ]);
    curl_exec($ch);
    curl_close($ch);

    echo "<p style='color:lime;'>Your message was sent successfully!</p>";
}
?>
