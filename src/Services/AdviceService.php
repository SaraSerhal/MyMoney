<?php

namespace App\Services;

class AdviceService
{
    public function getAdviceByProfileType(string $profileType): array
    {
        $advices = [
            'Traveler' => [
                ['url' => 'https://www.kayak.com', 'image' => 'https://worldvectorlogo.com/logos/kayak-logo.svg'],
                ['url' => 'https://www.airbnb.com', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/6/69/Airbnb_Logo_B%C3%A9lo.svg'],
                ['url' => 'https://www.agoda.com', 'image' => 'https://www.agoda.com/favicon.ico'],
                ['url' => 'https://www.tuifly.com', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/TUI_Logo_2016.svg/256px-TUI_Logo_2016.svg.png'],
                ['url' => 'https://www.eurocamp.com', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Eurocamp_Logo.svg/512px-Eurocamp_Logo.svg.png'],
                ['url' => 'https://www.holidayme.com', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/4/45/HolidayMelogo.png'],
            ],


            'Parent' => [  ['url' => 'https://www.google.com/shopping', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/1280px-Google_2015_logo.svg.png'],
                ['url' => 'https://www.amazon.com', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Amazon_logo.svg/1280px-Amazon_logo.svg.png'],
                ['url' => 'https://www.target.com', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Target_logo.svg/1024px-Target_logo.svg.png'],
                ['url' => 'https://www.walmart.com', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/c/ca/Walmart_logo.svg'],
                ['url' => 'https://www.ebay.com', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/EBay_logo.svg/1280px-EBay_logo.svg.png'],
                ['url' => 'https://www.hm.com', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/H%26M-Logo.svg/512px-H%26M-Logo.svg.png']
            ],

            'Couple' => [
                ['url' => 'https://www.groupon.com', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/Groupon_Logo.svg/512px-Groupon_Logo.svg.png'],
                ['url' => 'https://www.swarovski.com', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/06/Swarovski_new_logo.svg/512px-Swarovski_new_logo.svg.png'],
                ['url' => 'https://www.etsy.com', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Etsy_logo.svg/512px-Etsy_logo.svg.png'],
                ['url' => 'https://www.amazon.com/wedding', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg'],
                ['url' => 'https://www.bedbathandbeyond.com', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/Bedbath%26beyond.svg/256px-Bedbath%26beyond.svg.png'],
                ['url' => 'https://www.target.com', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Super_Target_Logo.png/1024px-Super_Target_Logo.png'],
            ],
            'Investor' => [
                ['url' => 'https://www.bloomberg.com', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/a/a2/Bloomberg_logo.png'],
                ['url' => 'https://www.marketwatch.com', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/f/f0/Farm-Fresh_marketwatch.png'],
                ['url' => 'https://www.investopedia.com', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/37/Investopedia_Logo.svg/512px-Investopedia_Logo.svg.png'],
                ['url' => 'https://www.seekingalpha.com', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e0/Seeking_Alpha_Logo.svg/128px-Seeking_Alpha_Logo.svg.png'],
                ['url' => 'https://www.finance.google.com', 'image' => 'https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_92x30dp.png'],
                ['url' => 'https://www.robinhood.com', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/a/af/Robinhood_Logotype_green.png'],
            ],
            'Student' => [
                ['url' => 'https://www.amazon.com/Amazon-Student/b?ie=UTF8&node=668781011', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg'],
                ['url' => 'https://www.chegg.com', 'image' => 'https://www.chegg.com/favicon.ico'],
                ['url' => 'https://www.khanacademy.org', 'image' => 'https://cdn.kastatic.org/images/khan-logo-vertical-transparent.png'],
                ['url' => 'https://www.spotify.com/us/student', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/1/19/Spotify_logo_without_text.svg'],
                ['url' => 'https://www.internshala.com', 'image' => 'https://internshala.com/static/images/common/internshala_logo.svg'],
                ['url' => 'https://www.e-leclerc.com', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/2/29/E._Leclerc_logo.png']

            ],
        ];

        return $advices[$profileType] ?? [];
    }
}