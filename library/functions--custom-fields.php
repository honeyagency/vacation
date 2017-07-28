<?php

function prepareHeaderFields()
{
    $imageID = get_field('field_58a778bf305af');
    if ($imageID != null) {
        $image = new TimberImage($imageID);
    } else {
        $image = null;
    }
    $section = array(
        'image' => $image,
    );
    return $section;
}
function prepareHomePageFields()
{
    $email = array(
        'title'       => get_field('field_58a785bf9d01f'),
        'description' => get_field('field_58a785d29d020'),
    );

    $homeGaleryArray = get_field('field_58f647f3f5147');

    if (!empty($homeGaleryArray)) {
        foreach ($homeGaleryArray as $image) {
            $homeGallery[] = new TimberImage($image['id']);
        }
    } else {
        $homeGallery = null;
    }
    $about = array(
        'title' => get_field('field_591619d4a8c0d'),
        'text'  => get_field('field_591619daa8c0e'),
    );
    $section = array(
        'email'       => $email,
        'title'       => get_field('field_597123546802e'),
        'hours'       => $hours,
        'description' => get_field('field_59137a9985eb2'),
        'food'        => $menus,
        'about'       => $about,
        'gallery'     => $homeGallery,
    );
    return $section;
}

function prepareOptionsPage()
{
    $imageID = get_field('field_58e80d8f357a7', 'options');
    if (!empty($imageID)) {
        $image = new TimberImage($imageID);
    } else {
        $image = null;
    }
    $address = array(
        'street' => get_field('field_58e80f0e1cb1a', 'options'),
        'city'   => get_field('field_58e8102e5bac8', 'options'),
        'state'  => get_field('field_58e810275bac7', 'options'),
        'zip'    => get_field('field_58e810065bac6', 'options'),
    );
    if (have_rows('field_58f0fc42a8c1a', 'option')) {
        $hours = array();
        while (have_rows('field_58f0fc42a8c1a', 'option')) {
            the_row();
            $hours[] = array(
                'day'       => get_sub_field('field_58f0fca4a8c1b', 'option'),
                'openTime'  => get_sub_field('field_58f0fcaaa8c1c', 'option'),
                'closeTime' => get_sub_field('field_58f0fcb8a8c1d', 'option'),
            );
        }
    }
    if (have_rows('field_59272d7b379c7', 'option')) {
        $prettyhours = array();
        while (have_rows('field_59272d7b379c7', 'option')) {
            the_row();
            $prettyhours[] = array(
                'days'  => get_sub_field('field_59272d82379c8', 'options'),
                'hours' => get_sub_field('field_59272d86379c9', 'options'),
            );
        }
    }
    $section = array(
        'image'        => $image,
        'address'      => $address,
        'facebook'     => get_field('field_5970ddd0b1238', 'options'),
        'twitter'      => get_field('field_5970dde1b1239', 'options'),
        'instagram'    => get_field('field_5970dde8b123a', 'options'),
        'phone_number' => get_field('field_58e80f2fae445', 'options'),
        'email'        => get_field('field_592761fdd75b1', 'options'),
        'pricerange'   => get_field('field_58ed166416862', 'options'),
        'hours'        => $hours,
        'prettyhours'  => $prettyhours,
    );

    return $section;
}
function prepareRestaurantMenus()
{

    if (have_rows('field_58e8184539609', 'options')) {
        $menus = array();
        while (have_rows('field_58e8184539609', 'options')) {
            the_row();
            $menu = array();
            if (have_rows('field_58e81865b4293', 'options')) {
                while (have_rows('field_58e81865b4293', 'options')) {
                    the_row();

                    $menu[] = array(
                        'item'        => get_sub_field('field_58e81869b4294', 'options'),
                        'description' => get_sub_field('field_58e8186eb4295', 'options'),
                        'price'       => get_sub_field('field_58ed14ca4aeeb', 'options'),
                    );
                }
                $mobileImageId = get_sub_field('field_5914a72c78924', 'options');
                if (!empty($mobileImageId)) {
                    $mobileImage = new TimberImage($mobileImageId);
                } else {
                    $mobileImage = null;
                }
                $menuImageId = get_sub_field('field_591c97e16077b', 'options');
                if (!empty($menuImageId)) {
                    $menuImage = new TimberImage($menuImageId);
                } else {
                    $menuImage = null;
                }
                $menus[] = array(
                    'title'       => get_sub_field('field_58e81852e57b8', 'options'),

                    'mobileimage' => $mobileImage,
                    'menuimage'   => $menuImage,
                    'description' => get_sub_field('field_58e81857e57b9', 'options'),
                    'menu'        => $menu,
                );

            }
        }
    }
    $menus = array(
        'menus'   => $menus,
        'sample' => get_field('field_5970ff43ec657', 'options'),
    );
    return $menus;
}
