<?php

require_once '../vendor/autoload.php';
require_once '../controller/Tweets.php';

use PHPUnit\Framework\TestCase;
use Apteles\Acme\Models\Post;

class Test extends TestCase {

    /**
     * Test the get and set in Object
     */
    public function testObject()
    {
        $tweet = new Tweets();
        $tweet->setFollowers(100);

        $this->assertEquals(100, $tweet->getFollowers());
        return $tweet;
    }

    /**
     * Test Empty Request Most Relevants
     */
    public function testEmptyRelevants()
    {
        $test = new tweetController();
        $this->assertNotEmpty($test->returnMost_relevants());

        return $test;
    }

    /**
     * Test Empty Request Most Mentions
     */
    public function testEmptyMentions()
    {
        $test = new tweetController();
        $this->assertNotEmpty($test->returnMost_mentions());

        return $test;
    }
}

?>