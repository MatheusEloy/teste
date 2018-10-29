<?php
require_once '../vendor/autoload.php';
require_once 'Tweets.php';

/**
 * Class to Request and Prepare Twitter's Json
 */
class tweetController {

    private $locaweb = '@locaweb';
    private $tweets = [];
    private $order = [];

    /**
     * Request all Twitter Json
     */
    private function requestTwitter($type)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['USERNAME:matheuseloy7@gmail.com']);
        curl_setopt($ch, CURLOPT_URL, 'http://tweeps.locaweb.com.br/'.$type);

        $request = json_decode(curl_exec($ch), true);
        curl_close($ch);

        if ($request) {
            return $request;
        }
    }

    /**
     * Return Json prepared to Most Relevants View
     */
    public function returnMost_relevants()
    {
        $twitter = $this->prepareJson($this->requestTwitter('most_relevants'));

        if ($twitter != NULL) {
            return $twitter;
        }
    }

    /**
     * Return Json prepared to Most Mentions View
     */
    public function returnMost_mentions()
    {
        $twitter = $this->prepareJson($this->requestTwitter('most_mentions'));

        if ($twitter != NULL) {
            return $twitter;
        }
    }

    /**
     * Prepare the Json response
     * @param $request JSON
     * @return JSON prepared
     */
    private function prepareJson($request)
    {
        foreach ($request['statuses'] as $key => $value) {
            if (strpos($value['text'], $this->locaweb) !== FALSE) {
                if (!$value['in_reply_to_user_id_str']) {
                    $tweet = new Tweets();

                    $tweet->setFollowers($value['user']['followers_count']);
                    $tweet->setScreen_name($value['user']['screen_name']);
                    $tweet->setProfile_link('https://twitter.com/'.$value['user']['screen_name']);
                    $tweet->setCreated_at($value['created_at']);
                    $tweet->setLink('https://twitter.com/'.$value['user']['screen_name'].'/status/'.$value['id']);
                    $tweet->setRetweet_count($value['retweet_count']);
                    $tweet->setText($value['text']);
                    $tweet->setFavorite_count($value['favorite_count']);

                    $this->order[] = $tweet->getFollowers();
                    $this->tweets[] = $tweet;
                }
            }
        }

        arsort($this->order);
        return $this->tweets = json_encode($this->orderArray());
    }

    /**
     * Ordenate the array to build the json
     * @return Array Ordenated
     */
    private function orderArray()
    {
        $return = [];
        $max = 0;

        foreach ($this->order as $order_key => $order_value) {
            foreach ($this->tweets as $tweet_key => $tweet_value) {
                if ($order_value == $tweet_value->getFollowers()) {
                    $return[] = $tweet_value;
                }
            }
        }

        return $return;
    }

} // End Class

?>
