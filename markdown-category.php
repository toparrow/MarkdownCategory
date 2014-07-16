<?php
/*
Plugin Name: Markdown Category
Plugin URI: https://github.com/toparrow/MarkdownCategory
Description: Markdown is applied only to the specified category.
Author: toparrow
Version: 1.0
Author URI: https://github.com/toparrow
*/

class MarkdownCategory
{
    private $url = '';
    private $path = '';
    private $parseDown = null;
    
    public function __construct()
    {
        $this->url  = plugins_url('', __FILE__);
        $this->path = plugin_dir_path(__FILE__);
        
        require_once $this->path . 'lib/parsedown/Parsedown.php';
        $this->parsedown = new Parsedown();

        add_action('admin_menu', array($this, 'admin_menu'));
        add_action('wp_head', array($this, 'wp_head'));
        add_filter('the_content', array($this, 'the_content'), 0);
    }

    public function wp_head()
    {
        $skin = get_option('skin');
        if (!$skin) {
            $skin = 'default';
        }
        echo '<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?skin=' . $skin . '"></script>';
        echo '<script src="' . $this->url . '/lib/marked.min.js"></script>' . "\n";
    }

    public function admin_menu()
    {
        add_submenu_page('plugins.php', 'Markdown Category Setting', 'Markdown CategorySetting', 8, __FILE__, array($this, 'add_submenu_page')); 
    }

    public function add_submenu_page()
    {
        include $this->path . 'markdown-category.setting.php';
    }

    public function the_content($content)
    {
        $class = get_post_class();
        $categoryList = get_option('category_list');
        if ($categoryList) {
            $categoryList = explode(',', $categoryList);
            foreach ($categoryList as $category) {
                $category = trim($category);
                if ($category && in_array($category, $class)) {
                    $content = $this->parsedown->text($content);
                    $content = str_replace('<pre>', '<pre class="prettyprint">', $content);
                    break;
                }
            }
        }
        return $content;
    }
}

$markdownCategory = new MarkdownCategory();