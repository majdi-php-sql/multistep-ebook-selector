<h1>Multistep eBook Selector Plugin</h1>

    <p>The <strong>Multistep eBook Selector</strong> plugin for WordPress is designed to streamline the process of offering eBooks to users based on their specific criteria, such as stream, year, and semester. This plugin provides a dynamic and user-friendly interface that allows users to select their stream, year, and semester through a sequential, multistep form. This intuitive approach ensures that users can quickly and efficiently find and access the eBooks that are most relevant to their educational needs.</p>

    <h2>Features</h2>
    <ul>
        <li>The plugin utilizes WordPress’s custom post types and taxonomies to manage and organize eBooks. It includes a custom post type for eBooks and custom taxonomies for streams, years, and semesters, enabling effective categorization and retrieval.</li>
        <li>AJAX is employed to handle form submissions and dynamically update the content without refreshing the page, providing a seamless and responsive user experience.</li>
        <li>JavaScript manages form visibility and user interactions, while PHP handles the backend logic and AJAX requests.</li>
    </ul>

    <h2>Installation</h2>
    <ol>
        <li><strong>Download the Plugin:</strong> Create a directory named <code>multistep-ebook-selector</code> within your <code>wp-content/plugins</code> folder.</li>
        <li><strong>Upload the Files:</strong> Inside the <code>multistep-ebook-selector</code> directory, create the necessary subdirectories and files:
            <ul>
                <li><code>multistep-ebook-selector.php</code></li>
                <li><code>includes/</code>
                    <ul>
                        <li><code>custom-post-types.php</code></li>
                        <li><code>ajax-handlers.php</code></li>
                    </ul>
                </li>
                <li><code>assets/js/</code>
                    <ul>
                        <li><code>form.js</code></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><strong>Activate the Plugin:</strong> Log in to your WordPress admin dashboard, navigate to the Plugins section, find "Multistep eBook Selector," and click "Activate."</li>
    </ol>

    <h2>Usage</h2>
    <ol>
        <li><strong>Configure Custom Post Types and Taxonomies:</strong> After activation, go to the WordPress admin dashboard and use the "eBooks" post type to add eBooks. Assign them to relevant streams, years, and semesters using the custom taxonomies created by the plugin.</li>
        <li><strong>Add the Form to Your Site:</strong> To display the multistep eBook selection form, use the shortcode <code>[mes_form]</code> in any post or page where you want the form to appear.</li>
        <li><strong>Select and Download eBooks:</strong> Users will be presented with a form to select their stream, year, and semester. Based on their selections, relevant eBooks will be dynamically listed for download. The form uses AJAX to fetch and display eBooks without refreshing the page, making the process quick and efficient.</li>
    </ol>

    <p>The <strong>Multistep eBook Selector</strong> plugin enhances user experience by providing a structured and interactive way to access educational resources, ensuring that users get exactly what they need with minimal effort.</p>
