<?php
// pages/blog.php - Blog Page Content Only

// Sample blog posts data (in real app, this would come from database)
$blog_posts = [
    [
        'id' => 1,
        'title' => 'Water Conservation Tips for Modern Homes',
        'excerpt' => 'Learn practical strategies to reduce water consumption without compromising your daily routine. Simple changes can make a big difference.',
        'content' => 'Water conservation has become increasingly important as communities face water scarcity challenges. In this comprehensive guide, we explore proven methods to reduce water usage in your home while maintaining comfort and convenience.',
        'author' => 'Maria Davis',
        'date' => '2024-03-15',
        'category' => 'Conservation',
        'image' => 'water-conservation.jpg',
        'read_time' => '5 min read'
    ],
    [
        'id' => 2,
        'title' => 'Understanding Your Water Usage Patterns',
        'excerpt' => 'Discover how to analyze your water consumption data to identify opportunities for efficiency improvements and cost savings.',
        'content' => 'Understanding when and how you use water is the first step toward better water management. Our monitoring systems provide detailed insights into your consumption patterns.',
        'author' => 'John Smith',
        'date' => '2024-03-12',
        'category' => 'Technology',
        'image' => 'water-usage.jpg',
        'read_time' => '7 min read'
    ],
    [
        'id' => 3,
        'title' => 'The Future of Smart Water Management',
        'excerpt' => 'Explore cutting-edge technologies that are revolutionizing how we monitor, manage, and optimize water systems in residential and commercial settings.',
        'content' => 'Smart water management systems are transforming the industry with IoT sensors, AI-powered analytics, and real-time monitoring capabilities.',
        'author' => 'Robert Johnson',
        'date' => '2024-03-10',
        'category' => 'Innovation',
        'image' => 'smart-water.jpg',
        'read_time' => '6 min read'
    ],
    [
        'id' => 4,
        'title' => 'Preventing Water Damage with Early Detection',
        'excerpt' => 'Learn how advanced alert systems can help you detect leaks and potential water damage before they become costly problems.',
        'content' => 'Early detection of water leaks and system issues can save thousands of dollars in damage repair costs. Our alert systems provide instant notifications.',
        'author' => 'Maria Davis',
        'date' => '2024-03-08',
        'category' => 'Prevention',
        'image' => 'leak-detection.jpg',
        'read_time' => '4 min read'
    ],
    [
        'id' => 5,
        'title' => 'Water Quality Monitoring Best Practices',
        'excerpt' => 'Essential guidelines for maintaining optimal water quality in your home or business, including testing schedules and treatment options.',
        'content' => 'Maintaining high water quality requires regular monitoring and proper treatment systems. Learn about the key parameters to track.',
        'author' => 'John Smith',
        'date' => '2024-03-05',
        'category' => 'Quality',
        'image' => 'water-quality.jpg',
        'read_time' => '8 min read'
    ],
    [
        'id' => 6,
        'title' => 'Seasonal Water Management Strategies',
        'excerpt' => 'Adapt your water usage and monitoring approach throughout the year to account for seasonal variations and weather patterns.',
        'content' => 'Different seasons bring unique water management challenges. From summer conservation to winter freeze protection, planning is essential.',
        'author' => 'Robert Johnson',
        'date' => '2024-03-01',
        'category' => 'Planning',
        'image' => 'seasonal-water.jpg',
        'read_time' => '6 min read'
    ]
];

// Get selected post if viewing individual post
$selected_post_id = $_GET['post'] ?? null;
$selected_post = null;
if ($selected_post_id) {
    foreach ($blog_posts as $post) {
        if ($post['id'] == $selected_post_id) {
            $selected_post = $post;
            break;
        }
    }
}
?>

<?php if ($selected_post): ?>
    <!-- Individual Blog Post View -->
    <section class="blog-hero">
        <div class="blog-hero-content">
            <div class="breadcrumb">
                <a href="?page=blog">← Back to Blog</a>
            </div>
            <h1><?php echo htmlspecialchars($selected_post['title']); ?></h1>
            <div class="blog-meta">
                <span class="author"><i class="fas fa-user"></i> <?php echo htmlspecialchars($selected_post['author']); ?></span>
                <span class="date"><i class="fas fa-calendar"></i> <?php echo date('F j, Y', strtotime($selected_post['date'])); ?></span>
                <span class="read-time"><i class="fas fa-clock"></i> <?php echo htmlspecialchars($selected_post['read_time']); ?></span>
                <span class="category"><i class="fas fa-tag"></i> <?php echo htmlspecialchars($selected_post['category']); ?></span>
            </div>
        </div>
    </section>

    <section class="blog-content-section">
        <div class="blog-container">
            <div class="blog-post-content">
                <div class="post-image-placeholder">
                    <i class="fas fa-image"></i>
                    <p>Blog Image: <?php echo htmlspecialchars($selected_post['image']); ?></p>
                </div>
                
                <div class="post-content">
                    <p><?php echo htmlspecialchars($selected_post['content']); ?></p>
                    
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    
                    <blockquote>
                        "Effective water management is not just about conservation—it's about creating sustainable systems that benefit both people and the environment."
                    </blockquote>
                    
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                </div>
            </div>
        </div>
    </section>

<?php else: ?>
    <!-- Blog List View -->
    <section class="blog-hero">
        <div class="blog-hero-content">
            <div class="water-drop"></div>
            <h1>WellOp Blog</h1>
            <p>Insights, tips, and updates from water management experts</p>
        </div>
    </section>

    <section class="blog-content-section">
        <div class="blog-container">
            <div class="blog-filters">
                <h3>Categories</h3>
                <div class="filter-buttons">
                    <button class="filter-btn active" data-category="all">All Posts</button>
                    <button class="filter-btn" data-category="Conservation">Conservation</button>
                    <button class="filter-btn" data-category="Technology">Technology</button>
                    <button class="filter-btn" data-category="Innovation">Innovation</button>
                    <button class="filter-btn" data-category="Prevention">Prevention</button>
                    <button class="filter-btn" data-category="Quality">Quality</button>
                    <button class="filter-btn" data-category="Planning">Planning</button>
                </div>
            </div>

            <div class="blog-posts-grid">
                <?php foreach ($blog_posts as $post): ?>
                    <article class="blog-card" data-category="<?php echo htmlspecialchars($post['category']); ?>">
                        <div class="blog-card-image">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <div class="blog-card-content">
                            <div class="blog-card-category"><?php echo htmlspecialchars($post['category']); ?></div>
                            <h3 class="blog-card-title">
                                <a href="?page=blog&post=<?php echo $post['id']; ?>">
                                    <?php echo htmlspecialchars($post['title']); ?>
                                </a>
                            </h3>
                            <p class="blog-card-excerpt"><?php echo htmlspecialchars($post['excerpt']); ?></p>
                            
                            <div class="blog-card-meta">
                                <div class="blog-meta-left">
                                    <span class="author"><?php echo htmlspecialchars($post['author']); ?></span>
                                    <span class="date"><?php echo date('M j, Y', strtotime($post['date'])); ?></span>
                                </div>
                                <span class="read-time"><?php echo htmlspecialchars($post['read_time']); ?></span>
                            </div>
                            
                            <a href="?page=blog&post=<?php echo $post['id']; ?>" class="read-more-btn">
                                Read More <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <script>
        // Blog filter functionality
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const blogCards = document.querySelectorAll('.blog-card');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const category = this.getAttribute('data-category');
                    
                    // Update active button
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Filter blog cards
                    blogCards.forEach(card => {
                        if (category === 'all' || card.getAttribute('data-category') === category) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
<?php endif; ?>