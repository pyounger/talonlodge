<?php

class App_Controller_Backend_Reviews extends App_Controller_Base_BackendSmart

{

    public

        $model = 'App_Model_Review';



    /* actions */

    public function action_default()

    {

        $this->load_entities();

    }



    public function action_load()

    {

        set_time_limit(0);

        include('app/libs/simplehtmldom/simple_html_dom.php');

        $html = file_get_html("http://www.tripadvisor.com/Hotel_Review-g60966-d1553334-Reviews-Talon_Lodge_Spa-Sitka_Alaska.html");

        $priority = 1;

        $ids = array();

        foreach($html->find('div.review-container') as $k => $r)

        {

            try {

                $review = new $this->model();

                // key

                $p = $r->find('p.partial_entry', 0);

                // content

                $review->content = $p->innertext;

                // date

                $d = $r->find('span.ratingDate', 0);

                $review->date = new DateTime(str_replace(array('Reviewed ', '<span class="new">NEW</span>'), array('', ''), $d->innertext));

                // title

                $t = $r->find('div.tooltips span', 0);

                $review->key = str_replace("ReportIAP_","rn",$t->attr['id']);

                $ti = $r->find('span.noQuotes', 0);

                $review->title = str_replace(array('“', '”'), array('',''), $ti->innertext);

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