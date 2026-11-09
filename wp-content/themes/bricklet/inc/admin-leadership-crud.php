<?php
/**
 * Bricklet Admin CRUD - Leadership & Management Team Management
 * Provides full CRUD interface in WP Admin for Board of Directors & Team.
 */

// ----------------------------------------------------
// 1. Database Schema Creation & Seeding
// ----------------------------------------------------
function bricklet_setup_leadership_database() {
    global $wpdb;
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    $charset_collate = $wpdb->get_charset_collate();
    $table_team = $wpdb->prefix . 'igh_leadership_team';

    $sql_team = "CREATE TABLE $table_team (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL DEFAULT '',
        position varchar(255) NOT NULL DEFAULT '',
        category varchar(100) NOT NULL DEFAULT 'Board of Directors',
        photo_url varchar(500) NOT NULL DEFAULT '',
        bio_short text NOT NULL,
        linkedin_url varchar(255) NOT NULL DEFAULT '',
        twitter_url varchar(255) NOT NULL DEFAULT '',
        sort_order int(11) NOT NULL DEFAULT 0,
        is_active tinyint(1) NOT NULL DEFAULT 1,
        created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    dbDelta($sql_team);

    // Seed default members if empty
    $count = $wpdb->get_var("SELECT COUNT(*) FROM $table_team");
    if ($count == 0) {
        $theme_uri = get_template_directory_uri();
        $seeds = array(
            array(
                'name'         => 'Ms. Sagiri Sakurai',
                'position'     => 'President Director',
                'category'     => 'Executive Leadership',
                'photo_url'    => $theme_uri . '/images/team/sagiri-sakurai.jpg',
                'bio_short'    => 'Spearheading PT Iida Group Holdings\' strategic expansion and Japanese earthquake-resistant construction standards across Indonesia.',
                'linkedin_url' => 'https://www.linkedin.com/',
                'twitter_url'  => 'https://x.com/',
                'sort_order'   => 1,
                'is_active'    => 1,
            ),
            array(
                'name'         => 'Mr. Hiroshi Nishino',
                'position'     => 'Director',
                'category'     => 'Board of Directors',
                'photo_url'    => $theme_uri . '/images/team/hiroshi-nishino.jpg',
                'bio_short'    => 'Overseeing operational excellence, engineering synergies, and precast concrete manufacturing standards.',
                'linkedin_url' => 'https://www.linkedin.com/',
                'twitter_url'  => 'https://x.com/',
                'sort_order'   => 2,
                'is_active'    => 1,
            ),
            array(
                'name'         => 'Mr. Takahiro Kakuta',
                'position'     => 'Director',
                'category'     => 'Board of Directors',
                'photo_url'    => $theme_uri . '/images/team/takahiro-kakuta.jpg',
                'bio_short'    => 'Leading industrial factory quality assurance, supply chain logistics, and regional production optimization.',
                'linkedin_url' => 'https://www.linkedin.com/',
                'twitter_url'  => 'https://x.com/',
                'sort_order'   => 3,
                'is_active'    => 1,
            ),
            array(
                'name'         => 'Mr. Hiroshi Tomishima',
                'position'     => 'Board of Commissioners',
                'category'     => 'Supervisory Board',
                'photo_url'    => $theme_uri . '/images/team/hiroshi-tomishima.jpg',
                'bio_short'    => 'Supervising corporate governance, statutory compliance, and group-wide risk management frameworks.',
                'linkedin_url' => 'https://www.linkedin.com/',
                'twitter_url'  => 'https://x.com/',
                'sort_order'   => 4,
                'is_active'    => 1,
            ),
            array(
                'name'         => 'Dr. Budi D. Notowidjojo',
                'position'     => 'Senior Advisor',
                'category'     => 'Senior Advisory',
                'photo_url'    => $theme_uri . '/images/team/budi-notowidjojo.jpg',
                'bio_short'    => 'Providing strategic guidance on Indonesian property market dynamics and sustainable community development.',
                'linkedin_url' => 'https://www.linkedin.com/',
                'twitter_url'  => 'https://x.com/',
                'sort_order'   => 5,
                'is_active'    => 1,
            ),
            array(
                'name'         => 'Dr. Ir. Maryoko Hadi, Dipl.E.Eng., MT.',
                'position'     => 'Senior Advisor',
                'category'     => 'Senior Advisory',
                'photo_url'    => $theme_uri . '/images/team/maryoko-hadi.jpg',
                'bio_short'    => 'Advising on seismic engineering standards, structural durability, and national building code alignments.',
                'linkedin_url' => 'https://www.linkedin.com/',
                'twitter_url'  => 'https://x.com/',
                'sort_order'   => 6,
                'is_active'    => 1,
            ),
        );

        foreach ($seeds as $s) {
            $wpdb->insert($table_team, $s);
        }
    }
}
add_action('init', 'bricklet_setup_leadership_database');
add_action('after_switch_theme', 'bricklet_setup_leadership_database');


// ----------------------------------------------------
// 2. Register Submenu under Page Content Settings
// ----------------------------------------------------
function bricklet_leadership_admin_menu() {
    add_submenu_page(
        'igh-homepage-hero',
        'Leadership & Team',
        'Leadership & Team',
        'manage_options',
        'igh-leadership-team',
        'bricklet_render_leadership_team_page'
    );
}
add_action('admin_menu', 'bricklet_leadership_admin_menu');


// ----------------------------------------------------
// 3. Admin Page Render & CRUD Processing
// ----------------------------------------------------
function bricklet_render_leadership_team_page() {
    global $wpdb;
    $table_team = $wpdb->prefix . 'igh_leadership_team';
    $_POST = wp_unslash($_POST);

    $action = isset($_GET['action']) ? sanitize_text_field($_GET['action']) : '';
    $item_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $message = '';
    $notice_type = 'success';

    // Handle Delete
    if ($action === 'delete' && $item_id > 0) {
        check_admin_referer('bricklet_team_delete_' . $item_id);
        $wpdb->delete($table_team, array('id' => $item_id));
        $message = 'Team member deleted successfully.';
    }

    // Handle Form Submit (Add or Edit)
    if (isset($_POST['bricklet_submit_team'])) {
        check_admin_referer('bricklet_team_form_nonce', 'bricklet_team_nonce');
        
        $edit_id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        $name = sanitize_text_field($_POST['name'] ?? '');
        $position = sanitize_text_field($_POST['position'] ?? '');
        $category = sanitize_text_field($_POST['category'] ?? '');
        $bio_short = sanitize_textarea_field($_POST['bio_short'] ?? '');
        $sort_order = intval($_POST['sort_order'] ?? 0);
        $is_active = isset($_POST['is_active']) ? 1 : 0;

        // Image handling: File Upload or Existing / Text URL
        $photo_url = esc_url_raw($_POST['photo_url_existing'] ?? '');
        if (function_exists('bricklet_handle_file_upload')) {
            $uploaded_photo = bricklet_handle_file_upload('photo_file');
            if (!empty($uploaded_photo)) {
                $photo_url = $uploaded_photo;
            }
        }
        if (!empty($_POST['photo_url_custom'])) {
            $photo_url = esc_url_raw($_POST['photo_url_custom']);
        }

        if (empty($name) || empty($position)) {
            $message = 'Please provide both Name and Position.';
            $notice_type = 'error';
        } else {
            $data = array(
                'name'         => $name,
                'position'     => $position,
                'category'     => $category,
                'photo_url'    => $photo_url,
                'bio_short'    => $bio_short,
                'sort_order'   => $sort_order,
                'is_active'    => $is_active,
            );

            if ($edit_id > 0) {
                $wpdb->update($table_team, $data, array('id' => $edit_id));
                $message = 'Team member updated successfully.';
            } else {
                $wpdb->insert($table_team, $data);
                $message = 'New team member added successfully.';
            }

            // Clear cache if available
            if (function_exists('bricklet_clear_page_cache')) {
                bricklet_clear_page_cache();
            }
        }
    }

    // Load data for editing if in edit mode
    $editing_item = null;
    if ($action === 'edit' && $item_id > 0) {
        $editing_item = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_team WHERE id = %d", $item_id), ARRAY_A);
    }

    // Fetch all members
    $members = $wpdb->get_results("SELECT * FROM $table_team ORDER BY sort_order ASC, id ASC", ARRAY_A);
    ?>

    <div class="wrap" style="max-width: 1200px;">
        <h1 class="wp-heading-inline">Leadership &amp; Management Team</h1>
        <hr class="wp-header-end" />

        <?php if (!empty($message)): ?>
            <div class="notice notice-<?php echo esc_attr($notice_type); ?> is-dismissible" style="margin-top: 15px;">
                <p><?php echo esc_html($message); ?></p>
            </div>
        <?php endif; ?>

        <div style="display: grid; grid-template-columns: 1fr 1.35fr; gap: 30px; margin-top: 20px; align-items: start;">
            
            <!-- FORM COLUMN (Add / Edit) -->
            <div style="background: #ffffff; padding: 24px; border: 1px solid #ccd0d4; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
                <h2 style="margin-top: 0; font-size: 1.25rem; border-bottom: 2px solid #006491; padding-bottom: 10px;">
                    <?php echo $editing_item ? 'Edit Member: ' . esc_html($editing_item['name']) : 'Add New Member'; ?>
                </h2>

                <form method="post" enctype="multipart/form-data">
                    <?php wp_nonce_field('bricklet_team_form_nonce', 'bricklet_team_nonce'); ?>
                    <input type="hidden" name="id" value="<?php echo $editing_item ? esc_attr($editing_item['id']) : '0'; ?>" />
                    <input type="hidden" name="photo_url_existing" value="<?php echo $editing_item ? esc_attr($editing_item['photo_url']) : ''; ?>" />

                    <table class="form-table" style="margin-top: 0;">
                        <tr>
                            <th scope="row"><label for="name">Full Name *</label></th>
                            <td>
                                <input name="name" id="name" type="text" class="regular-text" style="width: 100%;" value="<?php echo $editing_item ? esc_attr($editing_item['name']) : ''; ?>" placeholder="e.g. Ms. Sagiri Sakurai" required />
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="position">Position / Title *</label></th>
                            <td>
                                <input name="position" id="position" type="text" class="regular-text" style="width: 100%;" value="<?php echo $editing_item ? esc_attr($editing_item['position']) : ''; ?>" placeholder="e.g. President Director" required />
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="category">Category / Role</label></th>
                            <td>
                                <select name="category" id="category" style="width: 100%;">
                                    <?php 
                                    $cats = array('Executive Leadership', 'Board of Directors', 'Supervisory Board', 'Senior Advisory');
                                    $cur_cat = $editing_item ? $editing_item['category'] : 'Board of Directors';
                                    foreach ($cats as $c): ?>
                                        <option value="<?php echo esc_attr($c); ?>" <?php selected($cur_cat, $c); ?>><?php echo esc_html($c); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="photo_file">Portrait Photo</label></th>
                            <td>
                                <?php if ($editing_item && !empty($editing_item['photo_url'])): ?>
                                    <div style="margin-bottom: 12px; display: flex; align-items: center; gap: 15px;">
                                        <img src="<?php echo esc_url($editing_item['photo_url']); ?>" style="width: 70px; height: 95px; object-fit: cover; border-radius: 8px; border: 1px solid #ddd; box-shadow: 0 2px 5px rgba(0,0,0,0.1);" />
                                        <span style="font-size: 12px; color: #666;">Current Photo</span>
                                    </div>
                                <?php endif; ?>
                                <input type="file" name="photo_file" id="photo_file" accept="image/*" style="width: 100%; margin-bottom: 8px;" />
                                <p class="description" style="margin-top: 4px;">Or enter Image URL:</p>
                                <input type="text" name="photo_url_custom" class="regular-text" style="width: 100%;" placeholder="https://..." value="<?php echo $editing_item ? esc_attr($editing_item['photo_url']) : ''; ?>" />
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="bio_short">Short Quote / Bio</label></th>
                            <td>
                                <textarea name="bio_short" id="bio_short" rows="3" class="large-text" style="width: 100%;" placeholder="1-2 sentences summarizing executive responsibility or quote..."><?php echo $editing_item ? esc_textarea($editing_item['bio_short']) : ''; ?></textarea>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="sort_order">Sort Order</label></th>
                            <td>
                                <input name="sort_order" id="sort_order" type="number" value="<?php echo $editing_item ? esc_attr($editing_item['sort_order']) : '0'; ?>" style="width: 80px;" />
                                <p class="description">Lower numbers display first (e.g. 1, 2, 3...)</p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Status</th>
                            <td>
                                <label>
                                    <input type="checkbox" name="is_active" value="1" <?php checked($editing_item ? $editing_item['is_active'] : 1, 1); ?> />
                                    Active (Display on website)
                                </label>
                            </td>
                        </tr>
                    </table>

                    <p class="submit" style="margin-bottom: 0; padding-bottom: 0;">
                        <input type="submit" name="bricklet_submit_team" class="button button-primary" value="<?php echo $editing_item ? 'Update Member' : 'Save Member'; ?>" style="padding: 4px 20px;" />
                        <?php if ($editing_item): ?>
                            <a href="<?php echo esc_url(admin_url('admin.php?page=igh-leadership-team')); ?>" class="button button-secondary" style="margin-left: 10px;">Cancel Edit</a>
                        <?php endif; ?>
                    </p>
                </form>
            </div>

            <!-- TABLE COLUMN (List of all members) -->
            <div style="background: #ffffff; padding: 24px; border: 1px solid #ccd0d4; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
                <h2 style="margin-top: 0; font-size: 1.25rem; border-bottom: 2px solid #006491; padding-bottom: 10px;">
                    Current Team Members (<?php echo count($members); ?>)
                </h2>

                <table class="wp-list-table widefat fixed striped" style="margin-top: 15px; border-radius: 4px; overflow: hidden;">
                    <thead>
                        <tr>
                            <th style="width: 60px;">Photo</th>
                            <th>Name &amp; Role</th>
                            <th style="width: 110px;">Category</th>
                            <th style="width: 60px; text-align: center;">Order</th>
                            <th style="width: 70px; text-align: center;">Status</th>
                            <th style="width: 110px; text-align: right;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($members)): ?>
                            <tr><td colspan="6">No team members found. Add your first member using the form.</td></tr>
                        <?php else: ?>
                            <?php foreach ($members as $m): ?>
                                <tr>
                                    <td>
                                        <?php if (!empty($m['photo_url'])): ?>
                                            <img src="<?php echo esc_url($m['photo_url']); ?>" style="width: 44px; height: 58px; object-fit: cover; border-radius: 6px; border: 1px solid #ddd;" />
                                        <?php else: ?>
                                            <div style="width: 44px; height: 58px; background: #e2e8f0; border-radius: 6px; display: flex; align-items: center; justify-content: center; color: #888; font-size: 10px;">No Pic</div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <strong><?php echo esc_html($m['name']); ?></strong>
                                        <div style="color: #006491; font-weight: 500; font-size: 12px; margin-top: 2px;">
                                            <?php echo esc_html($m['position']); ?>
                                        </div>
                                    </td>
                                    <td>
                                        <span style="font-size: 11px; padding: 2px 6px; border-radius: 4px; background: #f1f5f9; color: #475569; display: inline-block;">
                                            <?php echo esc_html($m['category']); ?>
                                        </span>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php echo esc_html($m['sort_order']); ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php if ($m['is_active']): ?>
                                            <span style="color: #006491; font-weight: 700; font-size: 11px; background: #e0f2fe; padding: 2px 8px; border-radius: 9999px; border: 1px solid rgba(0, 179, 255, 0.4);">Active</span>
                                        <?php else: ?>
                                            <span style="color: #999; font-size: 12px;">Hidden</span>
                                        <?php endif; ?>
                                    </td>
                                    <td style="text-align: right; white-space: nowrap;">
                                        <a href="<?php echo esc_url(admin_url('admin.php?page=igh-leadership-team&action=edit&id=' . $m['id'])); ?>" class="button button-small">Edit</a>
                                        <a href="<?php echo esc_url(wp_nonce_url(admin_url('admin.php?page=igh-leadership-team&action=delete&id=' . $m['id']), 'bricklet_team_delete_' . $m['id'])); ?>" class="button button-small" style="color: #b91c1c;" onclick="return confirm('Are you sure you want to delete this member?');">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <?php
}
