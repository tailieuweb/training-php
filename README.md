Welcome to PHP TRAINING

# Configuration requirements

    - Version PHP 7.3 and above
    - OpenSSL PHP Extension

# Technology
- Pure PHP language

# Request appropriate edits

After a clone my repository to the local computer, you need to edit some code to be able to connect to the database and help the site works.

### Edit Setting

You need to change the information about **SMTP Mail** to be able to use some functions about user account authentication, change passwords, notify users, ...

Use the file "**setting.php example**" to create a new file called "**setting.php**" at the same level and edit the information in it.

```php
<?php
define('SMTP_HOST','smtp.gmail.com');
define('SMTP_PORT','465');
define('SMTP_UNAME','add_your_mail');
define('SMTP_PWORD','add_your_application_password_from_your_mail');
```

Change the value of the constant **SMTP_UNAME** and **SMTP_PWORD** to match the configuration you added on your Gmail.

**Where SMTP_PWORD is the application password for your _gmail.com_ account.**

Path: [`/lib/setting.php`](https://github.com/tailieuweb/training-php/tree/nhomd_chieu2/lib)
