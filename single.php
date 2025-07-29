<?php get_header(); ?>

<main id="main" class="main">
    <div class="notice">
            <div class="container">
                <h1 class="pagettl-bar -blue">お知らせ</h1>
                <div class="blockaside -sm">
                    <div class="blockaside__lg">
                        <span class="category__name">
                        <?php 
                          $news_cat = get_the_terms( $post->ID, 'news_category' );
                          if ( ! empty( $news_cat ) && ! is_wp_error( $news_cat ) ) {
                              foreach ( $news_cat as $cat ) {
                                  echo '<span class="single-category">' . esc_html( $cat->name ) . '</span> ';
                              }
                          }
                        ?>
                        </span>
                        <p class="activity-report__txt"><?php the_content(); ?></p>

                        <?php  if( has_post_thumbnail() ): ?>
                            <div class="child-page__img"><?php the_post_thumbnail('thumbnail'); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="activity-report__inner page-detail">
                    <div class="component">
                        <h2>h2タイトル margin-bottom:40px</h2>
                        <p>活動報告記事のテキストCSSは【TMP_子ページ】にて示したCSSが当たる。</p>
                        <h3>h3タイトルh3タイトルh3タイトルh3タイトル</h3>
                        <p>吾輩は猫である。名前はまだ無い。どこで生れたかとんと見当がつかぬ。何でも薄暗いじめじめした所でニャーニャー泣いていた事だけは記憶している。吾輩はここで始めて人間というものを見た。しかもあとで聞くとそれは書生という人間中で一番獰悪な種族であったそうだ。<br>この書生というのは時々我々を捕えて煮て食うという話である。</p>
                    </div>
                    <div class="navigation">
                        <div class="alignleft navigation__lft"><a href="https://cms.aozora-test.info/korea-edu/news/%e3%82%bf%e3%82%a4%e3%83%88%e3%83%ab%e5%85%a8%e8%a7%9230%e6%96%87%e5%ad%97%e3%81%be%e3%81%a7%ef%bc%88%e8%a1%a8%e7%a4%ba30%e6%96%87%e5%ad%97%e4%bb%a5%e4%b8%8a%e3%81%af%e7%9c%81%e7%95%a5%e3%81%99-3/" rel="prev">前の記事</a></div>
                        <a href="https://cms.aozora-test.info/korea-edu/news">一覧に戻る</a>
                        <div class="alignright navigation__rgt"><a href="https://cms.aozora-test.info/korea-edu/news/%e3%82%bf%e3%82%a4%e3%83%88%e3%83%ab%e5%85%a8%e8%a7%9230%e6%96%87%e5%ad%97%e3%81%be%e3%81%a7%ef%bc%88%e8%a1%a8%e7%a4%ba30%e6%96%87%e5%ad%97%e4%bb%a5%e4%b8%8a%e3%81%af%e7%9c%81%e7%95%a5%e3%81%99-5/" rel="next">次の記事</a></div>
                    </div>
                </div>
        </div>
    </div> 
</main>
<?php get_footer(); ?>