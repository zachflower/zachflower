<?php

return [
    'name' => 'Zachary Flower',
    'blog_url' => 'https://flower.codes',
    'rss_url' => 'https://flower.codes/feed.xml',
    'github_username' => 'zachflower',
    'about' => <<<ABOUT
Hi there. I'm <strong>Zach</strong>. Welcome to my profile. Obviously I'm experimenting with that classic <strong>MySpace</strong> look (within the limitations of <strong>GitHub's</strong> markdown renderer). Like a lot of developers my age, tweaking the look and feel on a MySpace page was one of my earliest exposures to HTML and JavaScript, so this felt like an appropriate homage to that time. Feel free to drop me a line or open a PR if you have any ideas on how to improve the attempt.
</sub>
<br />
<br />
<sub>
A few things I want to do at some point:
</sub>
<br />
<sub>
• Automatically update the recent blog post list
</sub>
<br />
<sub>
• Update the "friend count" number
</sub>
<br />
<sub>
• Render the "friend count" number as an SVG so it can be the proper color (red)
</sub>
<br />
<sub>
• Figure out a realistic comments system
</sub>
<br />
<sub>
• Kill the GitHub table for the friends list and use an SVG to better match the style
ABOUT,
    'meet' => <<<MEET
I have a pretty big list of nerd heroes that I'd love to meet someday, but after taking a trip down memory lane to put this profile together, I'd love to meet AOL's "You've Got Mail" guy. Preferably over the phone. Don't want to ruin the magic.
MEET,
    'friends' => [
        [
            'name' => 'Tom',
            'url' => '#',
            'image' => '/public/img/tom.jpg'
        ],
        [
            'name' => 'Clippy',
            'url' => '#',
            'image' => '/public/img/clippy.gif'
        ],
    ],
];