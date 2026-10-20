@extends('layouts.front.master')

@section('content')

   <div id="news-page" class="page ">
        <div class="page-header">
            <div class="container">
                <h1 class="page-title">Latest News</h1>
                <p class="page-subtitle">Stay updated with our latest announcements and achievements</p>
            </div>
        </div>

        <section class="section">
            <div class="container">
                <div class="news-container" id="news-container">
                    <!-- News articles will be dynamically inserted here -->
                </div>
            </div>
        </section>


    </div>

@endsection

@push('scripts')
    <script>
        const newsData = [
            {
                id: 1,
                image: "https://images.unsplash.com/photo-1504711434969-e33886168f5c?q=80&w=1170&auto=format&fit=crop",
                title: "AOI Academy Launches New AI & Machine Learning Program",
                excerpt: "We're excited to announce our comprehensive AI and Machine Learning certification program, designed to prepare professionals for the future of technology.",
                content: `
                    <p>AOI Academy is proud to announce the launch of our groundbreaking AI & Machine Learning certification program, developed in partnership with leading technology companies and research institutions.</p>

                    <p>This comprehensive 12-week program covers everything from fundamental concepts to advanced applications, including:</p>

                    <p>• Deep Learning and Neural Networks<br>
                    • Natural Language Processing<br>
                    • Computer Vision and Image Recognition<br>
                    • Machine Learning Operations (MLOps)<br>
                    • Ethical AI and Responsible Development</p>

                    <p>Our expert instructors bring years of industry experience from companies like Google, Microsoft, and Amazon. Students will work on real-world projects and have access to cutting-edge tools and technologies.</p>

                    <p>Registration opens February 1st, 2025, with the first cohort starting March 15th. Early bird pricing is available for the first 50 applicants.</p>
                `,
                author: "Digital Marketing Mastery",
                date: "2025-01-28",
                readingTime: "5 min read",
                views: "2,340",
                featured: true
            },
            {
                id: 2,
                image: "https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1171&auto=format&fit=crop",
                title: "Student Success Story: From Beginner to Data Scientist",
                excerpt: "Meet Sarah Ahmed, who transformed her career through our Data Analytics program and now works as a Senior Data Scientist at a Fortune 500 company.",
                content: `
                    <p>Six months ago, Sarah Ahmed was working in retail management with no technical background. Today, she's a Senior Data Scientist at one of Egypt's leading financial institutions, thanks to AOI Academy's intensive Data Analytics program.</p>

                    <p>"I never thought I could transition into tech at my age," says Sarah, 35. "But the instructors at AOI Academy made complex concepts accessible and provided the support I needed every step of the way."</p>

                    <p>Sarah's journey began with our foundational Data Analytics course, where she learned Python, SQL, and statistical analysis. Her dedication and the program's hands-on approach helped her build a portfolio that caught the attention of employers.</p>

                    <p>The program's career services team played a crucial role in her success, providing interview coaching, resume optimization, and connecting her with industry professionals.</p>

                    <p>"My advice to anyone considering a career change is simple: take the leap. AOI Academy provides all the tools and support you need to succeed," Sarah concludes.</p>
                `,
                author: "Marketing Team",
                date: "2025-01-25",
                readingTime: "4 min read",
                views: "1,890",
            },
            {
                id: 3,
                image: "https://images.unsplash.com/photo-1559136555-9303baea8ebd?q=80&w=1170&auto=format&fit=crop",
                title: "New Partnership with Microsoft for Cloud Computing Training",
                excerpt: "AOI Academy partners with Microsoft to offer certified Azure training programs, providing students with industry-recognized credentials.",
                content: `
                    <p>We're thrilled to announce our strategic partnership with Microsoft to deliver world-class Azure cloud computing training programs at AOI Academy.</p>

                    <p>This partnership brings several exciting opportunities for our students:</p>

                    <p>• Access to Microsoft Azure credits for hands-on practice<br>
                    • Industry-certified instructors trained by Microsoft<br>
                    • Direct pathway to Microsoft Azure certifications<br>
                    • Internship opportunities with Microsoft partners<br>
                    • Access to exclusive Microsoft learning resources</p>

                    <p>The program will cover Azure fundamentals, cloud architecture, security, and advanced services like AI and machine learning on the Azure platform.</p>

                    <p>"This partnership represents our commitment to providing students with the most relevant and valuable skills in today's technology landscape," said our Academic Director, Dr. Mohamed Farid.</p>

                    <p>The first Microsoft Azure certification bootcamp begins February 20th, 2025.</p>
                `,
                author: "Partnership Team",
                date: "2025-01-22",
                readingTime: "3 min read",
                views: "3,120",
            },
            {
                id: 4,
                image: "https://images.unsplash.com/photo-1517048676732-d65bc937f952?q=80&w=1170&auto=format&fit=crop",
                title: "Upcoming Tech Conference: 'Future of Work in Egypt'",
                excerpt: "Join us for a two-day conference exploring how technology is reshaping the workplace, featuring keynote speakers from leading tech companies.",
                content: `
                    <p>AOI Academy is hosting "Future of Work in Egypt," a landmark conference that will bring together industry leaders, entrepreneurs, and innovators to discuss the evolving landscape of work in the digital age.</p>

                    <p>The conference, scheduled for March 10-11, 2025, will feature:</p>

                    <p>• Keynote presentations from CEOs of major tech companies<br>
                    • Panel discussions on remote work and digital transformation<br>
                    • Workshops on emerging technologies<br>
                    • Networking sessions with industry professionals<br>
                    • Career fair with leading employers</p>

                    <p>Confirmed speakers include representatives from Vodafone Egypt, CIB Bank, and several successful startups that have emerged from Egypt's thriving tech ecosystem.</p>

                    <p>Early bird tickets are available until February 15th at a 40% discount. Students from any institution receive a special 60% discount on registration fees.</p>

                    <p>This is a unique opportunity to connect with the tech community and learn about the skills and mindset needed to thrive in tomorrow's workplace.</p>
                `,
                author: "Events Team",
                date: "2025-01-20",
                readingTime: "4 min read",
                views: "1,560",
            },
            {
                id: 5,
                image: "https://images.unsplash.com/photo-1553877522-43269d4ea984?q=80&w=1170&auto=format&fit=crop",
                title: "Course Curriculum Updates: Enhanced Learning Experience",
                excerpt: "We've updated our course curricula based on industry feedback and latest market demands to ensure our graduates have the most relevant skills.",
                content: `
                    <p>Following extensive consultation with industry partners and analysis of market trends, AOI Academy has updated its course curricula to better align with current industry needs.</p>

                    <p>Key updates include:</p>

                    <p><strong>Data Analytics Track:</strong><br>
                    • Added advanced Python libraries (Pandas, NumPy, Scikit-learn)<br>
                    • Enhanced focus on data visualization with Tableau and Power BI<br>
                    • Real-world capstone projects with actual company data</p>

                    <p><strong>Digital Marketing Program:</strong><br>
                    • New modules on influencer marketing and social commerce<br>
                    • Advanced Google Analytics and Facebook Ads certification<br>
                    • Content creation using AI tools</p>

                    <p><strong>Project Management Course:</strong><br>
                    • Agile and Scrum methodologies<br>
                    • Digital project management tools (Jira, Asana, Trello)<br>
                    • Remote team management strategies</p>

                    <p>These updates ensure our graduates are equipped with the most current and valuable skills demanded by today's employers.</p>
                `,
                author: "Academic Team",
                date: "2025-01-18",
                readingTime: "6 min read",
                views: "2,100",
            },
            {
                id: 6,
                image: "https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=1170&auto=format&fit=crop",
                title: "Alumni Network Reaches 5,000 Professionals Milestone",
                excerpt: "Our growing alumni network now includes over 5,000 professionals working across various industries, creating valuable connections and opportunities.",
                content: `
                    <p>AOI Academy celebrates a significant milestone as our alumni network surpasses 5,000 professionals working across diverse industries throughout Egypt and the MENA region.</p>

                    <p>Our graduates are making their mark in:</p>

                    <p>• Technology companies (35%)<br>
                    • Financial services (25%)<br>
                    • Healthcare and pharmaceuticals (15%)<br>
                    • Manufacturing and logistics (12%)<br>
                    • Consulting and professional services (13%)</p>

                    <p>The alumni network serves as a powerful platform for:</p>

                    <p>• Job referrals and career opportunities<br>
                    • Mentorship programs for current students<br>
                    • Industry insights and trend sharing<br>
                    • Collaborative projects and partnerships<br>
                    • Professional development workshops</p>

                    <p>To celebrate this milestone, we're launching the AOI Alumni Excellence Awards, recognizing outstanding achievements in innovation, leadership, and community impact.</p>

                    <p>Join our alumni LinkedIn group to stay connected and be part of this growing professional community.</p>
                `,
                author: "Alumni Relations",
                date: "2025-01-15",
                readingTime: "4 min read",
                views: "1,780",
            }
        ];


        // Function to format date
        function formatDate(dateString) {
            const options = { year: 'numeric', month: 'short', day: 'numeric' };
            return new Date(dateString).toLocaleDateString('en-US', options);
        }

        // Function to render news articles
        function renderNews(articles) {
            const container = document.getElementById('news-container');
            container.innerHTML = '';

            articles.forEach((article, index) => {
                const articleHTML = `
                    <article class="news-article mb-5 rounded-4 overflow-hidden card-custom" id="article-${article.id}">
                        <div class="article-image">
                            <img src="${article.image}" alt="${article.title}">
                        </div>

                        <div class="article-content p-4">
                            <h2 class="article-title fs-3 mb-4">${article.title}</h2>
                            <p class="article-excerpt text-muted fs-5 ">${article.excerpt}</p>

                            <div class="article-meta d-flex flex-wrap align-items-center gap-4 py-4 border-bottom mb-4">
                                <div class="meta-item d-flex align-items-center">
                                    <i class="fas fa-bookmark me-2"></i>
                                    <span>${article.author}</span>
                                </div>
                                <div class="meta-item d-flex align-items-center">
                                    <i class="fas fa-calendar me-2"></i>
                                    <span>${formatDate(article.date)}</span>
                                </div>
                                <div class="meta-item d-flex align-items-center">
                                    <i class="fas fa-clock me-2"></i>
                                    <span class="reading-time">${article.readingTime}</span>
                                </div>
                                <div class="meta-item d-flex align-items-center">
                                    <i class="fas fa-eye me-2"></i>
                                    <span>${article.views}</span>
                                </div>
                            </div>

                            <div class="article-full-content" style="display: none;">
                                ${article.content}
                            </div>

                            <div class="article-actions d-flex flex-wrap justify-content-between align-items-center gap-3 mt-4 pt-3 border-top ">
                                <button class="read-more-btn btn-card" onclick="toggleArticle(${article.id})">
                                    <i class="fas fa-book-open me-2"></i>Read Full Article
                                </button>

                                <div class="article-share d-flex flex-wrap gap-2 justify-content-center">
                                    <a href="#" class="share-btn-article btn btn-primary" onclick="shareArticle(event, 'facebook', '${article.id}')">
                                        <i class="fab fa-facebook-f me-2"></i>Share
                                    </a>
                                    <a href="#" class="share-btn-article btn btn-primary" onclick="shareArticle(event, 'twitter', '${article.id}')">
                                        <i class="fab fa-twitter me-2"></i>Tweet
                                    </a>
                                    <a href="#" class="share-btn-article btn btn-primary" onclick="shareArticle(event, 'linkedin', '${article.id}')">
                                        <i class="fab fa-linkedin me-2"></i>Share
                                    </a>
                                    <a href="#" class="share-btn-article btn btn-primary" onclick="copyArticleLink(event, '${article.id}')">
                                        <i class="fas fa-link me-2"></i>Copy Link
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                `;
                container.innerHTML += articleHTML;
            });
        }

        // Function to toggle article content
        function toggleArticle(articleId) {
            const article = document.querySelector(`[onclick="toggleArticle(${articleId})"]`).closest('.news-article');
            const fullContent = article.querySelector('.article-full-content');
            const excerpt = article.querySelector('.article-excerpt');
            const button = article.querySelector('.read-more-btn');

            if (fullContent.style.display === 'none') {
                fullContent.style.display = 'block';
                excerpt.style.display = 'none';
                button.innerHTML = '<i class="fas fa-chevron-up me-2"></i>Show Less';

                // Smooth scroll to article
                article.scrollIntoView({ behavior: 'smooth', block: 'start' });
            } else {
                fullContent.style.display = 'none';
                excerpt.style.display = 'block';
                button.innerHTML = '<i class="fas fa-book-open me-2"></i>Read Full Article';
            }
        }

        // Function to share individual articles
        function shareArticle(event, platform, articleId) {
            event.preventDefault();

            const article = newsData.find(a => a.id == articleId);
            if (!article) return;

            const shareText = `Check out: ${article.title}`;
            const shareUrl = `${window.location.origin}${window.location.pathname}#article-${articleId}`;

            switch (platform) {
                case 'facebook':
                    window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(shareUrl)}`, '_blank');
                    break;
                case 'twitter':
                    window.open(`https://twitter.com/intent/tweet?text=${encodeURIComponent(shareText)}&url=${encodeURIComponent(shareUrl)}`, '_blank');
                    break;
                case 'linkedin':
                    window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(shareUrl)}`, '_blank');
                    break;
            }
        }

        // Function to copy article link
        function copyArticleLink(event, articleId) {
            event.preventDefault();
            const shareUrl = `${window.location.origin}${window.location.pathname}#article-${articleId}`;

            navigator.clipboard.writeText(shareUrl).then(() => {
                const button = event.target.closest('.share-btn-article');
                const originalText = button.innerHTML;
                button.innerHTML = '<i class="fas fa-check me-2"></i>Copied!';

                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.style.background = '';
                    button.style.color = '';
                }, 2000);
            });
        }

        // Initialize page
        document.addEventListener('DOMContentLoaded', function () {
            // Render all news articles
            renderNews(newsData);


        });
    </script>
@endpush
