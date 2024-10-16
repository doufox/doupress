<?php
if (!isset($dp_config)) exit;

?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title><?php if (mc_is_post() || mc_is_page()) {
            mc_the_title(); ?> | <?php mc_site_name();
                                } else {
                                  mc_site_name(); ?> | <?php mc_site_desc();
                                                      } ?></title>
  <link href="<?php mc_theme_url('style.css'); ?>" type="text/css" rel="stylesheet" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="sitename"><a href="<?php mc_site_link(); ?>" title="<?php mc_site_desc(); ?>"><?php mc_site_name(); ?></a></div>
    </div>
    <div class="clear"></div>
    <div id="sidebar">
      <div class="photo"><img src="<?php mc_theme_url('photo.jpg'); ?>"></div>
      <div class="about">简短介绍或者联系方式什么的；简短介绍或者联系方式什么的</div>
      <div id="navbar">
        <a href="<?php mc_site_link(); ?>" class="home" title="首页">首页</a>
        <a href="<?php mc_get_url('archive'); ?>" class="archive" title="文章存档">文章存档</a>
        <a href="<?php mc_get_url('about'); ?>" class="contact" title="联系方式">联系方式</a>
        <a href="<?php mc_get_url('rss'); ?>" class="rss" title="RSS订阅" target="_blank">RSS订阅</a>
      </div>
      <div class="clear"></div>
      <div id="footer">Powered by <a href="http://doupress.com" target="_blank">DouPress</a></div>
    </div>
    <div id="content">
      <div id="content_box">
        <?php if (mc_is_post()) { ?>
          <div class="post">
            <h1 class="title"><?php mc_the_link(); ?></h1>
            <div class="content">
              <?php mc_the_content(); ?>
            </div>
            <div class="post_meta">
              <div class="post_date"><?php mc_the_date(); ?></div>
              <div class="post_tag"><?php mc_the_tags('', '', ''); ?></div>
              <div class="post_comm"><a href="<?php
              //mc_post_link(); 
              ?>#comm">评论</a></div>
            </div>
          </div>
        <?php if (mc_can_comment()) { ?>
          <div id="comm"><?php mc_comment_code(); ?></div>
        <?php } ?>

        <?php } else if (mc_is_page()) { ?>
          <div class="post">
            <!-- <h1 class="title"><?php
            //  mc_page_title();
            ?></h1> -->
            <div class="content">
              <?php mc_the_content(); ?>
            </div>
          </div>
          <?php if (mc_can_comment()) { ?>
            <div id="comm"><?php mc_comment_code(); ?></div>
          <?php } ?>
        <?php } else if (mc_is_archive()) { ?>
          <div class="post">
            <h1 class="title">文章存档</h1>
            <div class="content">
              <table width="280" border="0" align="center" cellpadding="0" cellspacing="0" style="margin:30px auto;">
                <tbody>
                  <tr>
                    <td width="140" style="vertical-align:top;">
                      <h1 class="date_list">月份</h1>
                      <ul id="list"><?php mc_date_list(); ?></ul>
                    </td>
                    <td width="140" style="vertical-align:top;">
                      <h1 class="tag_list">标签</h1>
                      <ul id="list"><?php mc_tag_list(); ?></ul>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        <?php } else { ?>
          <?php if (mc_is_tag()) { ?>
            <div id="page_info"><span><?php mc_tag_name(); ?></span></div>
          <?php } else if (mc_is_date()) { ?>
            <div id="page_info"><span><?php mc_date_name(); ?></span></div>
          <?php } ?>
          <?php while (mc_next_post()) { ?>
            <div class="post">
              <h1 class="title"><?php mc_the_link(); ?></h1>
              <div class="content">
                <?php mc_the_content(); ?>
              </div>
              <div class="post_meta">
                <div class="post_date"><?php mc_the_date(); ?></div>
                <div class="post_tag"><?php mc_the_tags('', '', ''); ?></div>
                <div class="post_comm"><a href="<?php 
                //mc_post_link(); 
                ?>#comm">评论</a></div>
              </div>
            </div>
          <?php } ?>
      </div>
      <div class="clear"></div>
      <div id="page_bar">
        <?php if (mc_has_new()) { ?><?php mc_goto_new('«'); ?><?php } ?>
        <?php if (mc_has_old()) { ?><?php mc_goto_old('»'); ?><?php } ?>
      </div>
    <?php } ?>
    </div>
  </div>
</body>

</html>