<div class="wrap scc">
    <h1 style="margin-bottom: 2rem;">Cookie Consent | Automating Global Compliance</h1>
    <div class="scc-header">
        <div class="scc-header__col">
            <h2>
                <a target="_blank" rel="noopener noreferrer" href="https://securiti.ai/privaci/cookie-consent-management/?utm_source=wordpress&utm_medium=referral&utm_campaign=plugin">
                    <img src="<?php echo plugin_dir_url(__DIR__) . 'admin/media/logo.png'; ?>" class="logo" width="261" alt="Cookie Consent by Securiti">
                </a>
            </h2>
        </div>
        <div class="scc-header__col tagline">
            <p><?php echo __('Fully Functional in Minutes', 'scc'); ?></p>
        </div>
        <div class="scc-header__col">
            <a target="_blank" rel="noopener noreferrer" href="https://www.rsaconference.com/about/press-releases/securitiai-named-most-innovative-startup-at-rsa-conference-innovation-sandbox/?utm_source=wordpress&utm_medium=referral&utm_campaign=plugin">
                <img src="<?php echo plugin_dir_url(__DIR__) . 'admin/media/header-rsac.png'; ?>" width="92" alt="Cookie Consent by Securiti">
            </a>
            <a target="_blank" rel="noopener noreferrer" href="https://securiti.ai/privacy-mangement-forrester-wave-report/?utm_source=wordpress&utm_medium=referral&utm_campaign=plugin">
                <img src="<?php echo plugin_dir_url(__DIR__) . 'admin/media/forrester-header.png'; ?>" width="92" alt="Forrester Wave Report">
            </a>
            <a target="_blank" rel="noopener noreferrer" href="https://securiti.ai/press-release/securiti-ai-wins-coveted-iapp-privacy-innovation-award/?utm_source=wordpress&utm_medium=referral&utm_campaign=plugin">
                <img src="<?php echo plugin_dir_url(__DIR__) . 'admin/media/iapp-innovation-award-2020.png'; ?>" width="92" alt="Innovation Award Winner">
            </a>
        </div>
    </div>

    <div class="scc-body">
        <div class="scc-body__row">
            <div class="scc-body__col">
                <div class="scc-getting-started">
                    <h3 style="text-transform: none"><?php echo __('Getting Started with', 'scc'); ?> <a href="https://privacycenter.cloud/?utm_source=wordpress&utm_medium=referral&utm_campaign=plugin" target="_blank" rel="noopener noreferrer">Securiti</a></h3>

                    <p><?php echo __("Creating a free Privacy Center account is the first step to fully utilize this powerful plugin. <br>With just a few clicks, you'll be able to set up your account and start displaying a cookie banner on your WordPress website.", 'scc'); ?></p>

                    <a target="_blank" rel="noopener noreferrer" href="https://privacycenter.cloud/?utm_source=wordpress&utm_medium=referral&utm_campaign=plugin" class="scc-btn --theme-secondary" target="_blank" rel="noopener noreferrer"><?php echo __('Create my Free Privacy Center Account', 'scc'); ?></a>
                </div>

                <hr>

                <div class="scc-cookie-code">
                    <p class="big"><?php echo __('Once you’ve created your Privacy Center account, head over to the “Cookie Consent Management” page and under the “consent code” tab (see the image below) you will find the styling and cookie consent script.', 'scc'); ?></p>

                    <img src="<?php echo plugin_dir_url(__DIR__) . 'admin/media/product-consent-landing.png'; ?>" width="800" height="363" style="display:block; margin-bottom: 1rem; border: 2px solid #efeff0; border-bottom-width: 7px;">

                    <p><?php echo __('Copy + paste your styling along with the cookie consent script in the box below to display the cookie banner and preference center on your wordpress website.', 'scc'); ?></p>

                    <form method="post" action="options.php">
                        <?php settings_fields('cookie-consent-code'); ?>
                        <?php do_settings_sections('cookie-consent-code'); ?>

                        <textarea name="scc_code"><?php echo sanitize_textarea_field(esc_attr(get_option('scc_code'))); ?></textarea>

                        <?php submit_button(); ?>

                    </form>
                </div>

                <div class="scc-disclaimer">
                    <h3><?php echo __('What to expect', 'scc'); ?></h3>
                    <p><?php echo __("With Securiti, you can expect an effortless deployment of the cookie consent script on your website, allowing visitors to easily provide or withdraw their consent. You'll also have access to a comprehensive dashboard where you can track consent status and view the number of consents granted, declined, or withdrawn.", 'scc'); ?></p>

                    <h3><?php echo __('What more can I do with my free Privacy Center account?', 'scc'); ?></h3>
                    <p><?php echo __("Your free Privacy Center account comes with a suite of tools to help you manage privacy on your website. With pre-defined templates, you can create a privacy notice/policy in just a few minutes. You can also configure your own Privacy Center, linking it to your website to demonstrate your commitment towards privacy and build trust with your visitors.", 'scc'); ?></p>

                    <h3><?php echo __('Disclaimer', 'scc'); ?></h3>
                    <p><?php echo __('Use of this plugin does not, by itself, ensure compliance with legal requirements related to cookies', 'scc'); ?></p>
                </div>

            </div>
            <div class="scc-body__col --sidebar">
                <h3><?php echo __('GET HELP', 'scc'); ?></h3>
                <p class="small"><?php echo __('Use the support forums to connect with us directly, or email us at support[@]securiti.ai. <br><br>Join our <a href="https://join.slack.com/t/privacycenter-vnf8376/shared_invite/zt-1ikctj27q-n9zz1t_B0qomZGuPT7ZWfA">Slack community</a>', 'scc'); ?></p>

                <hr>

                <h3><?php echo __('What does the Free version of Privacy Center offer?', 'scc'); ?></h3>
                <p><?php echo __('With the free Privacy Center account, you get to build one privacy notice and set up a cookie preference center. This basic plan is free forever, so you can start using it today!', 'scc'); ?></p>

                <hr>

                <h3><?php echo __('How do I upgrade from the free version?', 'scc'); ?></h3>
                <p><?php echo __("If you're ready to take your privacy compliance to the next level, upgrading to the Pro or Business plans is a breeze. Simply log in to your Privacy Center account and select the plan you want to upgrade to. You'll get the first 30 days absolutely free when you upgrade from the basic plan to the pro or business plan. The checkout process is quick and easy, so you can start using the full suite of features in no time!", 'scc'); ?></p>

                <hr>

                <h3><?php echo __('About', 'scc'); ?></h3>
                <p><?php echo __('Securiti is the leader in multi-cloud data protection, privacy and governance. Its solutions establish autonomous guardrails around sensitive data, to ensure key obligations are continuously met. Securiti’s award-winning privacy compliance platform allows small, medium and enterprise businesses to comply with global privacy laws including GDPR, CPRA, PIPEDA, LGPD, and many more.<br><br><a href="https://securiti.ai/privacy-mangement-forrester-wave-report/?utm_source=referral&utm_medium=plug-in&utm_campaign=Cookie+Consent">Download the report to learn</a> why Forrester Wave named Securiti the industry-leader in the current offering (technology solutions) category.', 'scc'); ?></p>
            </div>
        </div>
    </div>
</div>