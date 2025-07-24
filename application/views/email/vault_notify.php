<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
</head>
<body style="margin: 0; padding: 100px; background-color: #f2f2f2;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
        <tr>
            <td align="center" bgcolor="#ffffff" style="padding: 20px; border-radius: 10px; margin-top: 20px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td align="center">
                            <img src="<?php echo base_url() ?>assets/images/logo.png" alt="Image" style="width:400px; display: block; margin: 0 auto;">
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 20px;">
                            <?php echo $component_text['email_vault_desc'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 20px;">
                            <a target="_blank" href="<?php echo base_url() ?>PtLogin" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: #ffffff; text-decoration: none; border-radius: 5px;"><?php echo $component_text['email_see_vault'] ?></a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>