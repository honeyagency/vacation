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
    if (have_rows('field_58f10c28ccfb6')) {
        $hours = array();
        while (have_rows('field_58f10c28ccfb6')) {
            the_row();
            $hours[] = array(
                'days'  => get_sub_field('field_58f10c48ccfb7'),
                'hours' => get_sub_field('field_58f10c54ccfb8'),
            );
        }
    }
    $homeGaleryArray = get_field('field_58f647f3f5147');

    if (!empty($homeGaleryArray)) {
        foreach ($homeGaleryArray as $image) {
            $homeGallery[] = new TimberImage($image['id']);
        }
    } else {
        $homeGallery = null;
    }

    $section = array(
        'email'       => $email,
        'hours'       => $hours,
        'description' => get_field('field_59137a9985eb2'),
        'food'        => $menus,
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
    $section = array(
        'image'        => $image,
        'address'      => $address,
        'phone_number' => get_field('field_58e80f2fae445', 'options'),
        'pricerange'   => get_field('field_58ed166416862', 'options'),
        'hours'        => $hours,
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
                $imageId = get_sub_field('field_5914a72c78924', 'options');
                if (!empty($imageId)) {
                    $image = new TimberImage($imageId);
                } else {
                    $image = null;
                }
                $menus[] = array(
                    'title'       => get_sub_field('field_58e81852e57b8', 'options'),
                    'image'       => $image,
                    'description' => get_sub_field('field_58e81857e57b9', 'options'),
                    'menu'        => $menu,
                );

            }
        }
    }
    return $menus;
}
