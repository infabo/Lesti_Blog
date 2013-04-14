<?php
/**
 * Created by JetBrains PhpStorm.
 * User: gordon
 * Date: 27.03.13
 * Time: 14:10
 * To change this template use File | Settings | File Templates.
 */

// create example category
$categoryData = array(
    'title'         => 'Lesti::Blog',
    'identifier'    => 'lesti-blog',
    'parent_id'     => 0,
    'stores'        => array(0)
);
$category = Mage::getModel('blog/category')->setData($categoryData)->save();

// create example tag
$tagData = array(
    'title'         => 'Magento',
    'identifier'    => 'magento',
    'stores'        => array(0)
);
$tag = Mage::getModel('blog/tag')->setData($tagData)->save();

// create example post
$author = Mage::getModel('admin/user')->getCollection()->getFirstItem();

$postData = array(
    'author_id'         => $author->getId(),
    'creation_time'     => Mage::getSingleton('core/date')->gmtDate(),
    'update_time'       => Mage::getSingleton('core/date')->gmtDate(),
    'is_active'         => Lesti_Blog_Model_Post::STATUS_ENABLED,
    'content'           => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.<!--more--> At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',
    'title'             => 'Example Post',
    'identifier'        => 'example-post',
    'stores'            => array(0),
    'categories'        => array($category->getId()),
    'tags'              => array($tag->getId())
);
$post = Mage::getModel('blog/post')->setData($postData)->save();

// create comment
$commentData1 = array(
    'post_id'       => $post->getId(),
    'author_name'   => 'Gordon Lesti',
    'author_email'  => 'info@gordonlesti.com',
    'author_url'    => 'http://gordonlesti.com/',
    'content'       => "Hello,\nI'm Gordon Lesti and I have developed Lesti::Blog. Thank you for using and have fun.",
    'status'        => Lesti_Blog_Model_Post_Comment::STATUS_ENABLED
);
$comment1 = Mage::getModel('blog/post_comment')->setData($commentData1)->save();