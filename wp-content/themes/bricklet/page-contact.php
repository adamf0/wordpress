<?php
/**
 * Template Name: Contact Page
 */

$contact_success = null;
$contact_error = null;

if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_nonce']) ) {
    if ( wp_verify_nonce($_POST['contact_nonce'], 'send_contact_message') ) {
        $fullname = isset($_POST['fullname']) ? sanitize_text_field($_POST['fullname']) : '';
        $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
        $subject_type = isset($_POST['subject_type']) ? sanitize_text_field($_POST['subject_type']) : '';
        $message = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';

        if ( empty($fullname) || empty($email) || empty($message) ) {
            $contact_error = "Please fill in all required fields.";
        } elseif ( ! is_email($email) ) {
            $contact_error = "Please provide a valid email address.";
        } else {
            $to = function_exists('bricklet_get_env_var') ? bricklet_get_env_var('CONTACT_TO_EMAIL', 'adamilkom00@gmail.com') : 'adamilkom00@gmail.com';
            $subject = 'New Contact Form Submission: ' . $subject_type;
            
            // HTML escape variables to prevent any XSS/HTML Injection/Exploits
            $fullname_esc = esc_html($fullname);
            $email_esc = esc_html($email);
            $subject_type_esc = esc_html($subject_type);
            $message_esc = nl2br(esc_html($message));

            // Professional HTML Email Body template
            $body = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin: 0; padding: 0; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; background-color: #fbf9f7; color: #1b1c1b; -webkit-font-smoothing: antialiased;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #fbf9f7; padding: 40px 20px;">
        <tr>
            <td align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background-color: #ffffff; border: 1px solid #E2E8F0; border-radius: 4px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);">
                    <!-- Header -->
                    <tr>
                        <td style="background-color: #0A1F2C; padding: 30px 40px; text-align: left; border-bottom: 3px solid #03C5F0;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 24px; font-weight: 700; letter-spacing: -0.5px;">PT IIDA GROUP</h1>
                            <p style="margin: 5px 0 0 0; color: #03C5F0; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 2px;">Inquiry Notification</p>
                        </td>
                    </tr>
                    <!-- Content -->
                    <tr>
                        <td style="padding: 40px;">
                            <p style="margin: 0 0 24px 0; font-size: 16px; line-height: 24px; color: #3e4851;">
                                Hello, <br><br>
                                You have received a new contact form submission. Below are the details of the inquiry:
                            </p>
                            
                            <!-- Fields Table -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 30px; border-collapse: collapse;">
                                <tr>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #E2E8F0; font-size: 14px; font-weight: 700; color: #0A1F2C; width: 130px; vertical-align: top;">Full Name</td>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #E2E8F0; font-size: 14px; color: #3e4851; vertical-align: top;">' . $fullname_esc . '</td>
                                </tr>
                                <tr>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #E2E8F0; font-size: 14px; font-weight: 700; color: #0A1F2C; vertical-align: top;">Email Address</td>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #E2E8F0; font-size: 14px; color: #03C5F0; vertical-align: top;"><a href="mailto:' . $email_esc . '" style="color: #006491; text-decoration: none; font-weight: 500;">' . $email_esc . '</a></td>
                                </tr>
                                <tr>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #E2E8F0; font-size: 14px; font-weight: 700; color: #0A1F2C; vertical-align: top;">Subject</td>
                                    <td style="padding: 12px 0; border-bottom: 1px solid #E2E8F0; font-size: 14px; color: #3e4851; vertical-align: top;">' . $subject_type_esc . '</td>
                                </tr>
                                <tr>
                                    <td style="padding: 16px 0 0 0; font-size: 14px; font-weight: 700; color: #0A1F2C; vertical-align: top;" colspan="2">Message</td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 0 0 0; font-size: 14px; line-height: 22px; color: #3e4851; vertical-align: top;" colspan="2">
                                        <div style="background-color: #F8FAFC; border: 1px solid #E2E8F0; padding: 15px; border-radius: 4px; white-space: pre-wrap; font-family: inherit;">' . $message_esc . '</div>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin: 0; font-size: 14px; color: #6e7882; line-height: 20px;">
                                This message was automatically sent from the contact portal on <strong>PT Iida Group</strong>. You can reply directly to this email to respond to the inquirer.
                            </p>
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f1f5f9; padding: 20px 40px; text-align: center; border-top: 1px solid #E2E8F0;">
                            <p style="margin: 0; font-size: 12px; color: #6e7882; line-height: 18px;">
                                &copy; 2026 PT Iida Group. All rights reserved. <br>
                                Quality Reliability Standards &bull; ISO 9001 &bull; JIS
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
';
            
            $headers = array(
                'Content-Type: text/html; charset=UTF-8',
                'Reply-To: ' . $fullname . ' <' . $email . '>'
            );

            // Set valid from address and name to prevent PHPMailer validation failure on local host
            $from_filter = function() { return 'noreply@ptighd.co.id'; };
            $from_name_filter = function() { return 'PT Iida Group'; };
            add_filter('wp_mail_from', $from_filter);
            add_filter('wp_mail_from_name', $from_name_filter);

            $mail_sent = wp_mail($to, $subject, $body, $headers);

            // Clean up the filters
            remove_filter('wp_mail_from', $from_filter);
            remove_filter('wp_mail_from_name', $from_name_filter);

            if ( $mail_sent ) {
                $contact_success = "Thank you for your message! Our team will contact you shortly.";
                $_POST = array(); // Clear input fields on success
            } else {
                $contact_error = "There was an error sending your message. Please try again later.";
            }
        }
    } else {
        $contact_error = "Security check failed. Please refresh the page and try again.";
    }
}

get_header();
?>

<!-- Hero Section -->
<header class="relative pt-40 pb-24 overflow-hidden bg-surface-bright">
    <div class="relative z-10 max-w-container-max mx-auto px-margin-desktop-alt">
        <div class="max-w-2xl">
            <p class="text-primary font-label-bold text-label-bold mb-4 tracking-[0.2em] uppercase">Communication Portal</p>
            <h1 class="font-display-lg text-display-lg text-deep-navy mb-6">Get in Touch</h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant">We are committed to providing industrial excellence and structural integrity. Reach out to our teams across Indonesia for collaboration and inquiries.</p>
        </div>
    </div>
</header>

<!-- Main Content: Split Screen Layout -->
<main class="max-w-container-max mx-auto px-margin-desktop-alt py-12 md:py-margin-desktop-alt">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
        <!-- Left: Contact Form -->
        <section class="lg:col-span-7 bg-white p-12 border border-structural-gray rounded shadow-sm">
            <h2 class="font-headline-lg text-headline-lg text-deep-navy mb-10">Send a Message</h2>
            
            <?php if ( $contact_success ) : ?>
                <div class="bg-green-50 text-primary border border-primary p-4 rounded mb-8 flex items-start gap-3">
                    <span class="material-symbols-outlined text-primary font-bold">check_circle</span>
                    <div>
                        <p class="font-body-md font-medium text-primary"><?php echo esc_html($contact_success); ?></p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( $contact_error ) : ?>
                <div class="bg-red-50 text-error border border-error p-4 rounded mb-8 flex items-start gap-3">
                    <span class="material-symbols-outlined text-error font-bold">error</span>
                    <div>
                        <p class="font-body-md font-medium text-error"><?php echo esc_html($contact_error); ?></p>
                    </div>
                </div>
            <?php endif; ?>

            <form class="space-y-8" id="wp-contact-form" action="" method="POST">
                <?php wp_nonce_field('send_contact_message', 'contact_nonce'); ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label for="fullname" class="font-label-bold text-label-bold text-on-surface-variant uppercase">Full Name</label>
                        <input id="fullname" name="fullname" class="w-full py-3 bg-transparent form-input-minimal font-body-md border-b border-structural-gray focus:outline-none focus:border-primary transition-colors" placeholder="John Doe" type="text" value="<?php echo isset($_POST['fullname']) ? esc_attr($_POST['fullname']) : ''; ?>" required />
                    </div>
                    <div class="space-y-2">
                        <label for="email" class="font-label-bold text-label-bold text-on-surface-variant uppercase">Email Address</label>
                        <input id="email" name="email" class="w-full py-3 bg-transparent form-input-minimal font-body-md border-b border-structural-gray focus:outline-none focus:border-primary transition-colors" placeholder="john@company.com" type="email" value="<?php echo isset($_POST['email']) ? esc_attr($_POST['email']) : ''; ?>" required />
                    </div>
                </div>
                <div class="space-y-2">
                    <label for="subject_type" class="font-label-bold text-label-bold text-on-surface-variant uppercase">Subject</label>
                    <select id="subject_type" name="subject_type" class="w-full py-3 bg-transparent form-input-minimal font-body-md border-b border-structural-gray focus:outline-none focus:border-primary transition-colors appearance-none">
                        <option <?php selected(isset($_POST['subject_type']) ? $_POST['subject_type'] : '', 'General Inquiry'); ?>>General Inquiry</option>
                        <option <?php selected(isset($_POST['subject_type']) ? $_POST['subject_type'] : '', 'Project Collaboration'); ?>>Project Collaboration</option>
                        <option <?php selected(isset($_POST['subject_type']) ? $_POST['subject_type'] : '', 'Business Partnership'); ?>>Business Partnership</option>
                        <option <?php selected(isset($_POST['subject_type']) ? $_POST['subject_type'] : '', 'Media &amp; PR'); ?>>Media &amp; PR</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label for="message" class="font-label-bold text-label-bold text-on-surface-variant uppercase">Message</label>
                    <textarea id="message" name="message" class="w-full py-3 bg-transparent form-input-minimal font-body-md border-b border-structural-gray focus:outline-none focus:border-primary transition-colors resize-none" placeholder="Tell us about your requirements..." rows="5" required><?php echo isset($_POST['message']) ? esc_textarea($_POST['message']) : ''; ?></textarea>
                </div>
                <div class="pt-4">
                    <button class="bg-primary text-white px-10 py-4 rounded font-label-bold text-label-bold uppercase tracking-widest hover:bg-on-primary-fixed-variant transition-colors flex items-center gap-3" type="submit">
                        Submit Inquiry
                        <span class="material-symbols-outlined text-sm">send</span>
                    </button>
                </div>
            </form>
        </section>

        <!-- Right: Office Information & Map -->
        <aside class="lg:col-span-5 flex flex-col gap-12">
            <!-- Contact Details Card -->
            <div class="space-y-12">
                <!-- Head Office -->
                <div class="flex gap-6 items-start group">
                    <div class="bg-primary-fixed p-4 rounded text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined">corporate_fare</span>
                    </div>
                    <div>
                        <h3 class="font-label-bold text-label-bold text-primary uppercase mb-2">Head Office</h3>
                        <p class="font-headline-md text-headline-md text-deep-navy mb-2">Cicadas, Gunung Putri</p>
                        <address class="not-italic font-body-md text-on-surface-variant">
                            Jl. Pancasila I, Cicadas, Gunung Putri,<br/>
                            Bogor District, West Java 16964
                        </address>
                    </div>
                </div>
                <!-- Branch Office -->
                <div class="flex gap-6 items-start group">
                    <div class="bg-primary-fixed p-4 rounded text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined">location_city</span>
                    </div>
                    <div>
                        <h3 class="font-label-bold text-label-bold text-primary uppercase mb-2">Branch Office</h3>
                        <p class="font-headline-md text-headline-md text-deep-navy mb-2">Pondok Indah</p>
                        <address class="not-italic font-body-md text-on-surface-variant">
                            Pondok Indah Office Tower 1, <br/>
                            South Jakarta, Indonesia
                        </address>
                    </div>
                </div>
                <!-- Phone & Email -->
                <div class="pt-8 border-t border-structural-gray grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="font-label-bold text-label-bold text-on-surface-variant uppercase mb-3">Direct Contact</h3>
                        <p class="flex items-center gap-2 font-body-lg font-bold text-deep-navy">
                            <span class="material-symbols-outlined text-primary">call</span>
                            +62-21-8686-9299
                        </p>
                    </div>
                    <div>
                        <h3 class="font-label-bold text-label-bold text-on-surface-variant uppercase mb-3">Email Support</h3>
                        <p class="flex items-center gap-2 font-body-lg font-bold text-deep-navy">
                            <span class="material-symbols-outlined text-primary">mail</span>
                            sales@ptighd.co.id
                        </p>
                    </div>
                </div>
            </div>
            <!-- Map Placeholder -->
            <div class="relative w-full h-[300px] rounded overflow-hidden border border-structural-gray shadow-sm group">
                <div class="absolute inset-0 bg-surface-container-high flex items-center justify-center overflow-hidden">
                    <img class="w-full h-full object-cover grayscale opacity-50 group-hover:opacity-80 transition-opacity" data-alt="A highly detailed architectural site map of the West Java Bogor district featuring industrial estates." src="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_be6b69374366f18b02f2acae095314e4.webp"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-deep-navy/40 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 right-6 flex justify-between items-end">
                        <span class="bg-white px-4 py-2 rounded text-body-sm font-bold shadow-lg">Bogor Head Office</span>
                        <a class="bg-primary text-white p-3 rounded-full shadow-xl hover:scale-110 transition-transform" href="https://maps.app.goo.gl/B9UjQ637X4fyW3x97" target="_blank" rel="noopener noreferrer">
                            <span class="material-symbols-outlined">directions</span>
                        </a>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</main>

<!-- Trust Banner -->
<section class="bg-deep-navy py-16 text-white text-center">
    <div class="max-w-container-max mx-auto px-margin-desktop-alt">
        <h2 class="font-headline-md text-headline-md mb-8 opacity-60 uppercase tracking-[0.3em] text-sm">Quality Reliability Standards</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-gutter opacity-40 grayscale brightness-200">
            <div class="flex items-center justify-center p-4">
                <span class="font-display-md text-display-md font-bold italic tracking-tighter">ISO 9001</span>
            </div>
            <div class="flex items-center justify-center p-4">
                <span class="font-display-md text-display-md font-bold italic tracking-tighter">OHSAS 18001</span>
            </div>
            <div class="flex items-center justify-center p-4">
                <span class="font-display-md text-display-md font-bold italic tracking-tighter">KAN</span>
            </div>
            <div class="flex items-center justify-center p-4">
                <span class="font-display-md text-display-md font-bold italic tracking-tighter">JIS</span>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" nonce="<?php echo bricklet_get_nonce(); ?>">
    document.addEventListener("DOMContentLoaded", function() {
        // Micro-interactions for form focus states
        const formInputs = document.querySelectorAll('.form-input-minimal, select, textarea');
        formInputs.forEach(element => {
            element.addEventListener('focus', () => {
                const label = element.parentElement.querySelector('label');
                if (label) label.style.color = '#006491';
            });
            element.addEventListener('blur', () => {
                const label = element.parentElement.querySelector('label');
                if (label) label.style.color = '';
            });
        });

        // Natural form submission handles the post request and sends email via WordPress wp_mail()
    });
</script>

<?php
get_footer();
?>
