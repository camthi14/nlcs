<?php $i = 0; ?>

<main>
    <div class="blog">
        <div class=" bg_top">
            <div class="bg_top-content ">
                <h1 class="bg_top-title">Blog</h1>
                <div class="bg_top-info">
                    <a href="<?= _WEB_ROOT . '/' ?>" class="bg_top-link">Home</a>
                    <i class="fa-solid fa-chevron-down bg_top-chevron"></i>
                    <p class="bg_top-sub">Blog</p>
                </div>
            </div>
        </div>
        <div class="blog_main">
            <div class="row">
                <div class="col-lg-8 col-xl-12 row blog_main-left">
                    <?php if (isset($data['blog']) && is_array($data['blog'])) : ?>
                        <?php foreach ($data['blog'] as $blog) : ?>
                            <?php $i++ ?>
                            <?php if ($i === 3) : ?>
                                <div class="blog_content-note">
                                    <a href="" class="blog_content-link">
                                        <p class="content-about">Muriel Barbery</p>
                                        <p class="content-sub">When tea becomes ritual, it takes its place at the
                                            heart
                                            of our ability to see greatness in small things. Where is
                                            beauty to be found? In great things that, like everything else, are
                                            doomed
                                            to
                                            die, or in small things that aspire to
                                            nothing, yet know how to set a jewel of infinity in a single moment?</p>
                                        <span class="quote fa fa-quote-left"></span>
                                    </a>
                                </div>
                            <?php else : ?>
                                <?php if ($blog['interface'] === 1) : ?>
                                    <div class="blog_content-item blog_content-item1">
                                        <a href="" class="blog_content-link">
                                            <div class="content-img">
                                                <img src="<?= _PATH_IMG_BLOG . $blog['image'] ?>" alt="">
                                            </div>
                                            <p class="content-about"><?= htmlspecialchars($blog['title_sub']) ?></p>
                                            <h3 class="content-title"><?= htmlspecialchars($blog['title_main']) ?></h3>

                                        </a>
                                        <span class="content-sub"><?= htmlspecialchars($blog['description']) ?></span>
                                        <div class="content-calendar">
                                            <span class="content-month">February 21, 2018</span>
                                            <div class="content-info">
                                                <div class="content-cmt">
                                                    <i class="fa-solid fa-comment-dots"></i>
                                                    <span>4</span>
                                                </div>
                                                <div class="content-view">
                                                    <i class="fa-solid fa-eye"></i>
                                                    <span>2,387</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php else : ?>
                                    <div class="blog_content-item blog_content-item2">
                                        <a href="" class="blog_content-link">
                                            <div class="content-img">
                                                <img src="<?= _PATH_IMG_BLOG . $blog['image'] ?>" alt="">
                                            </div>
                                            <div class="bg_content-body">
                                                <div class="content-body">
                                                    <div class="content-about content-about2"><?= htmlspecialchars($blog['title_sub']) ?>
                                                    </div>
                                                    <div class="content-title content-title2">
                                                        <span>February 21, 2018</span>
                                                        <?= htmlspecialchars($blog['title_main']) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                <?php endif ?>
                            <?php endif ?>
                        <?php endforeach ?>
                    <?php endif ?>
                    <div class="blog_content-note">
                        <a href="" class="blog_content-link">
                            <p class="content-about">Henry James, The Portrait of a Lady</p>

                            <p class="content-sub">There are few hours in life more agreeable than the
                                hour
                                dedicated to the ceremony known as afternoon tea.</p>
                            <i class="fa-solid fa-link link-icon"></i>
                        </a>

                    </div>
                </div>
                <div class="col-lg-4 blog_main-right">
                    <div class="blog_right-content">
                        <div class="blog_right-name">
                            <img src=" <?= _PUBLIC_CLIENT . '/image/blog/theme-icon.png' ?>" alt="">
                            <h3>Categories</h3>
                            <div class="line"></div>
                        </div>
                        <ul class="blog_categories-list">
                            <li class="blog_categories-item">
                                <a href="" class="blog_categories-link">Black</a>
                                <span>(3)</span>
                            </li>
                            <li class="blog_categories-item">
                                <a href="" class="blog_categories-link">Ceremony</a>
                                <span>(1)</span>
                            </li>
                            <li class="blog_categories-item">
                                <a href="" class="blog_categories-link">Chine Tea</a>
                                <span>(1)</span>
                            </li>
                            <li class="blog_categories-item">
                                <a href="" class="blog_categories-link">Green Tea</a>
                                <span>(2)</span>
                            </li>
                        </ul>
                    </div>
                    <div class="blog_right-content">
                        <div class="blog_right-name">
                            <img src=" <?= _PUBLIC_CLIENT . '/image/blog/theme-icon.png' ?>" alt="">
                            <h3>Recent posts</h3>
                            <div class="line"></div>
                        </div>
                        <div class="blog_recent-list">
                            <a href="" class="recent_main">
                                <div class="recent_main-img">
                                    <img src=" <?= _PUBLIC_CLIENT . '/image/footer/blog_01-110x80.jpg' ?>" alt="">
                                </div>
                                <div class="recent_op">
                                    <p class="recent_date">February 21, 2018</p>
                                    <p class="recent_name">3 way how to test nutaral indian tea</p>
                                </div>
                            </a>
                            <a href="" class="recent_main">
                                <div class="recent_main-img">
                                    <img src=" <?= _PUBLIC_CLIENT . '/image/footer/blog_02-110x80.jpg' ?>" alt="">
                                </div>
                                <div class="recent_op">
                                    <p class="recent_date">February 21, 2018</p>
                                    <p class="recent_name">Results of international tea conference'18</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="blog_right-content">
                        <div class="blog_right-name">
                            <img src=" <?= _PUBLIC_CLIENT . '/image/blog/theme-icon.png' ?>" alt="">
                            <h3>Tags</h3>
                            <div class="line"></div>
                        </div>
                        <ul class="blog_tags-list">
                            <li class="blog_tags-item">
                                <a href="" class="blog_tags-link">#<span>black</span></a>
                            </li>
                            <li class="blog_tags-item">
                                <a href="" class="blog_tags-link">#<span>ceremony</span></a>
                            </li>
                            <li class="blog_tags-item">
                                <a href="" class="blog_tags-link">#<span>china</span></a>
                            </li>
                            <li class="blog_tags-item">
                                <a href="" class="blog_tags-link">#<span>green</span></a>
                            </li>
                            <li class="blog_tags-item">
                                <a href="" class="blog_tags-link">#<span>plantations</span></a>
                            </li>
                            <li class="blog_tags-item">
                                <a href="" class="blog_tags-link">#<span>tea</span></a>
                            </li>
                            <li class="blog_tags-item">
                                <a href="" class="blog_tags-link">#<span>white</span></a>
                            </li>
                        </ul>
                    </div>

                    <div class="blog_right-content">
                        <div class="blog_right-name">
                            <img src=" <?= _PUBLIC_CLIENT . '/image/blog/theme-icon.png' ?>" alt="">
                            <h3>Calendar</h3>
                            <div class="line"></div>
                        </div>
                        <div class="calendar-table">
                            <table class="table table-borderless caption-top fs-3">
                                <caption class="text-center fs-2 green">July 2022</caption>
                                <thead>
                                    <tr>
                                        <th scope="col" title="Monday">Mon</th>
                                        <th scope="col" title="Tuesday">Tue</th>
                                        <th scope="col" title="Wednesday">Wed</th>
                                        <th scope="col" title="Thursday">Thu</th>
                                        <th scope="col" title="Friday">Fri</th>
                                        <th scope="col" title="Saturday">Sat</th>
                                        <th scope="col" title="Sunday">Sun</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="4"></td>
                                        <td colspan="1">1</td>
                                        <td colspan="1">2</td>
                                        <td colspan="1">3</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>5</td>
                                        <td>6</td>
                                        <td>7</td>
                                        <td>8</td>
                                        <td>9</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>12</td>
                                        <td>13</td>
                                        <td>14</td>
                                        <td>15</td>
                                        <td>16</td>
                                        <td>17</td>
                                    </tr>
                                    <tr>
                                        <td>18</td>
                                        <td>19</td>
                                        <td>20</td>
                                        <td>21</td>
                                        <td>22</td>
                                        <td>23</td>
                                        <td>24</td>
                                    </tr>
                                    <tr>
                                        <td>25</td>
                                        <td>26</td>
                                        <td>27</td>
                                        <td>28</td>
                                        <td>29</td>
                                        <td>30</td>
                                        <td>31</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>