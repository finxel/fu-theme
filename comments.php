<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
        <h3><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>

        <?php $comments->listComments(); ?>

        <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>

    <?php endif; ?>

    <?php if ($this->allow('comment')): ?>
	<div class="row">
	                        <div class="col-12">
	                            <div class="card" id="<?php $this->respondId(); ?>">
	                                <div class="card-header">
	                                    <h4 class="card-title">评论</h4>
	                                </div>
	                                <div class="card-content">
	                                    <div class="card-body">
											<div class="cancel-comment-reply">
											    <?php $comments->cancelReply(); ?>
											</div>
											
											<h3 id="response"><?php _e('添加新评论'); ?></h3>
											<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
											    <?php if ($this->user->hasLogin()): ?>
											        <p><?php _e('登录身份: '); ?><a
											                href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a
											                href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a>
											        </p>
											    <?php else: ?>
											        <p>
											            <label for="author" class="required"><?php _e('称呼'); ?></label>
											            <input type="text" name="author" id="author" class="form-control"
											                   value="<?php $this->remember('author'); ?>" required/>
											        </p>
											        <p>
											            <label
											                for="mail"<?php if ($this->options->commentsRequireMail): ?> class="required"<?php endif; ?>><?php _e('Email'); ?></label>
											            <input type="email" name="mail" id="mail" class="form-control"
											                   value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
											        </p>
											        <p>
											            <label
											                for="url"<?php if ($this->options->commentsRequireURL): ?> class="required"<?php endif; ?>><?php _e('网站'); ?></label>
											            <input type="url" name="url" id="url" class="form-control" placeholder="<?php _e('http://'); ?>"
											                   value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
											        </p>
											    <?php endif; ?>
												<div class="row">
												    <div class="col-12">
												                    <label for="textarea" class="required"><?php _e('内容'); ?></label>
												                    <textarea rows="8" cols="50" name="text" id="textarea" class="form-control"
												                              required><?php $this->remember('text'); ?></textarea>
												               
												    </div>
												</div>
											    <p>
											        <button type="submit" class="btn btn-primary mr-1 mb-1"><?php _e('提交评论'); ?></button>
											    </p>
											</form>
	                                        
	                                        
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
        
    <?php else: ?>
        <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
</div>
