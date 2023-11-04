<?php

namespace Database\Seeders;

use App\Models\ContactLink;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactLink::insert([
			[
				'type'		=> 'social',
				'brand'		=> 'discord',
				'title' 	=> 'Discord username',
				'url'		=> 'https://discord.com/',
				'icon'		=> 'bx bxl-discord',
				'actived'	=> '0',
				'user_id'	=> 1
			],
			[
				'type'		=> 'social',
				'brand'		=> 'facebook',
				'title' 	=> 'Facebook username',
				'url'		=> 'https://facebook.com/',
				'icon'		=> 'bx bxl-facebook',
				'actived'	=> '0',
				'user_id'	=> 1
			],
			[
				'type'		=> 'social',
				'brand'		=> 'instagram',
				'title' 	=> 'Instagram username',
				'url'		=> 'https://instagram.com/',
				'icon'		=> 'bx bxl-instagram',
				'actived'	=> '0',
				'user_id'	=> 1
			],
			[
				'type'		=> 'social',
				'brand'		=> 'linkedIn',
				'title' 	=> 'LinkedIn username',
				'url'		=> 'https://linkedIn.com/',
				'icon'		=> 'bx bxl-linkedin',
				'actived'	=> '0',
				'user_id'	=> 1
			],
			[
				'type'		=> 'social',
				'brand'		=> 'pinterest',
				'title' 	=> 'Pinterest username',
				'url'		=> 'https://pinterest.com/',
				'icon'		=> 'bx bxl-pinterest',
				'actived'	=> '0',
				'user_id'	=> 1
			],
			[
				'type'		=> 'social',
				'brand'		=> 'snapchat',
				'title' 	=> 'Snap username',
				'url'		=> 'https://snapchat.com/',
				'icon'		=> 'bx bxl-snapchat',
				'actived'	=> '0',
				'user_id'	=> 1
			],
			[
				'type'		=> 'social',
				'brand'		=> 'telegram',
				'title' 	=> 'Telegram username',
				'url'		=> 'https://telegram.com/',
				'icon'		=> 'bx bxl-telegram',
				'actived'	=> '0',
				'user_id'	=> 1
			],
			[
				'type'		=> 'social',
				'brand'		=> 'tiktok',
				'title' 	=> 'Tiktok username',
				'url'		=> 'https://tiktok.com/',
				'icon'		=> 'bx bxl-tiktok',
				'actived'	=> '0',
				'user_id'	=> 1
			],
			[
				'type'		=> 'social',
				'brand'		=> 'twitch',
				'title' 	=> 'Twitch username',
				'url'		=> 'https://twitch.com/',
				'icon'		=> 'bx bxl-twitch',
				'actived'	=> '0',
				'user_id'	=> 1
			],
			[
				'type'		=> 'social',
				'brand'		=> 'twitter',
				'title' 	=> 'Twitter username',
				'url'		=> 'https://twitter.com/',
				'icon'		=> 'bx bxl-twitter',
				'actived'	=> '0',
				'user_id'	=> 1
			],
			[
				'type'		=> 'social',
				'brand'		=> 'whatsapp',
				'title' 	=> 'Whatsapp account name',
				'url'		=> 'https://whatsapp.com/',
				'icon'		=> 'bx bxl-whatsapp',
				'actived'	=> '0',
				'user_id'	=> 1
			],
			[
				'type'		=> 'social',
				'brand'		=> 'youtube',
				'title' 	=> 'Channel name',
				'url'		=> 'https://youtube.com/',
				'icon'		=> 'bx bxl-youtube',
				'actived'	=> '0',
				'user_id'	=> 1
			],
			[
				'type'		=> 'ecommerce',
				'brand'		=> 'blibli',
				'title' 	=> 'Acoount name',
				'url'		=> 'https://blibli.com/',
				'icon'		=> 'blibli.png',
				'actived'	=> '0',
				'user_id'	=> 1
			],
			[
				'type'		=> 'ecommerce',
				'brand'		=> 'bukalapak',
				'title' 	=> 'Acoount name',
				'url'		=> 'https://bukalapak.com/',
				'icon'		=> 'bukalapak.png',
				'actived'	=> '0',
				'user_id'	=> 1
			],
			[
				'type'		=> 'ecommerce',
				'brand'		=> 'jdid',
				'title' 	=> 'Acoount name',
				'url'		=> 'https://jd.id/',
				'icon'		=> 'jdid.png',
				'actived'	=> '0',
				'user_id'	=> 1
			],
			[
				'type'		=> 'ecommerce',
				'brand'		=> 'lazada',
				'title' 	=> 'Acoount name',
				'url'		=> 'https://lazada.com/',
				'icon'		=> 'lazada.png',
				'actived'	=> '0',
				'user_id'	=> 1
			],
			[
				'type'		=> 'ecommerce',
				'brand'		=> 'shopee',
				'title' 	=> 'Acoount name',
				'url'		=> 'https://shopee.com/',
				'icon'		=> 'shopee.png',
				'actived'	=> '0',
				'user_id'	=> 1
			],
			[
				'type'		=> 'ecommerce',
				'brand'		=> 'tiktokshop',
				'title' 	=> 'Acoount name',
				'url'		=> 'https://tiktokshop.com/',
				'icon'		=> 'tiktokshop.jpg',
				'actived'	=> '0',
				'user_id'	=> 1
			],
			[
				'type'		=> 'ecommerce',
				'brand'		=> 'tokopedia',
				'title' 	=> 'Acoount name',
				'url'		=> 'https://tokopedia.com/',
				'icon'		=> 'tokopedia.png',
				'actived'	=> '0',
				'user_id'	=> 1
			],
			[
				'type'		=> 'ecommerce',
				'brand'		=> 'zalora',
				'title' 	=> 'Acoount name',
				'url'		=> 'https://zalora.com/',
				'icon'		=> 'zalora.png',
				'actived'	=> '0',
				'user_id'	=> 1
			]
		]);
    }
}
