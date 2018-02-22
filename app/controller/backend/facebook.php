<?php
class App_Controller_Backend_Facebook extends App_Controller_Base_BackendSmart
{
    public
        $model = 'App_Model_Facebook';

    /* actions */
    public function action_default()
    {
        $this->load_entities();
    }

    public function action_load()
    {
        set_time_limit(0);
        $fb_id = 'talonlodge';
		$facebook = new Facebook(array(
					'appId' => '350400178412975',
					'secret' => 'fed3444ef2c701b1a540764f911ba652',
				));
		$token = $facebook->getAccessToken();
        if (!is_null($token))
        {
            $title_words_count = 5;
            $priority = 1;
            $ids = array();
            try {
                $json = json_decode(file_get_contents("https://graph.facebook.com/$fb_id/feed?access_token=$token"), true);
				//d($json);
				//exit;
                foreach($json as $k => $p)
                {
                    foreach ($p as $r)
                    {
                        $review = new $this->model();
                        // content
						$message = null;
                        if (isset($r['message']))
                        {
							$message = $r['message'];
						}
						elseif (isset($r['caption']))
                        {
							$message = $r['caption'];
						}
						if (!is_null($message))
						{
                            $review->content = $message;
                            // key
                            $review->key = $r['id'];
                            // date
                           // $d = $r['updated_time'];
                            $d = $r['created_time'];
                            $review->date = new DateTime($d);
                            // title -- first 5 words
                            $parts = explode(' ', $review->content);
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
                        }
                    }
                }
            }
            catch (Exception $e)
            {
				d($e);
				exit;		
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
        }
        // redirect back
        $this->redirect_backend_back();
    }

    public function action_refresh_token()
    {
        $fb_id = 'talonlodge';
        $token = $this->outlet->from('App_Model_FacebookToken')->orderBy('datetime DESC')->findOne();
        $url = sprintf('https://graph.facebook.com/oauth/access_token?client_id=251700138257407&client_secret=5544c5cdbd84e842b4055a993242d02b&grant_type=fb_exchange_token&fb_exchange_token=%s', $token->token);
        try {
            $result = file_get_contents($url);
            $parts = explode('=', $result);
            $value = explode('&', $parts[1]);
            $token->token = $value[0];
            $token->datetime = new DateTime();
            $this->outlet->save($token);
        } catch (Exception $e)
        {
            d($e);
        }
        exit;
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