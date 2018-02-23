<?php
class App_Controller_Backend_Twitter extends App_Controller_Base_BackendSmart
{
    public
        $model = 'App_Model_Twitter';

    /* actions */
    public function action_default()
    {
        $this->load_entities();
    }

    public function action_load()
    {
		/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
		$settings = array(
			'oauth_access_token' => "200240770-VExvi1I5e2wRhyspmuhQsP3udGTwXaoE2SnEaaHZ",
			'oauth_access_token_secret' => "52h5pmKGfUID0hOdIy0FSRifGW7ZhC9fGDmLzLQtuLk",
			'consumer_key' => "UsoKBx9xKDb49B7SrMcpA",
			'consumer_secret' => "rV4eOw6jJnHq6tVjezDAkRzJVKxxMiYF1y0k4D6bk"
		);	

		$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
		$getfield = '?screen_name=talonlodge&count=20';
		$requestMethod = 'GET';
		$twitter = new TwitterAPIExchange($settings);
		$result = $twitter->setGetfield($getfield)
					 ->buildOauth($url, $requestMethod)
					 ->performRequest();
		$result = json_decode($result);

		$title_words_count = 5;
		$priority = 1;
		$ids = array();
		foreach($result as $status)
		{
			try {
				$review = new $this->model();
				// key
				$review->key = $status->id;
				// content
				$review->content = $status->text;
				// date
				$review->date = new DateTime($status->created_at);
				// title -- first 5 words
				$parts = explode(' ', $status->text);
				$count = count($parts);
				$count = $count < $title_words_count ? $count : $title_words_count;
				$title = array();
				for ($i=0; $i<$count; $i++)
					$title[] = $parts[$i];
				$title = sprintf('%s...', implode(' ', $title));
				$review->title = $title;
				// priority
				$review->priority = $priority;
				$priority++;
				// is published
				$review->is_published = 1;
				// replace existing reviews
				$this->outlet->query(sprintf('DELETE FROM {%s} WHERE `key` = "%s"', $this->model, $review->key));
				$this->outlet->save($review);
				// collect ids
				$ids[] = $review->id;
			} catch (Exception $e) {
				d($e);
			}
		}

        // fix other reviews priorities
        if (count($ids) > 0)
        {
            $reviews = $this->outlet->from($this->model)->where(sprintf('`id` NOT IN (%s)', implode(',', $ids)))->orderBy('priority ASC')->find();
            foreach ($reviews as $review)
            {
                $review->priority = $priority;
                $priority++;
                $this->outlet->save($review);
            }
        }

        // redirect back
        $this->redirect_backend_back();
    }


    public function action_view()
    {
        $this->entity_view();
    }

    public function action_add()
    {
        $this->entity_add();
    }

    public function action_edit()
    {
        $this->entity_edit();
    }

    public function action_delete()
    {
        $this->entity_delete($this->request->param('id'));
    }

    public function action_toggle_published()
    {
        $this->entity_toggle_published();
    }

    public function action_up()
    {
        $this->entity_up();
    }

    public function action_down()
    {
        $this->entity_down();
    }
}
?>