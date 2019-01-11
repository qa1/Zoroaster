<?php

    namespace KarimQaderi\Zoroaster\Http\Requests;


    use KarimQaderi\Zoroaster\Traits\Builder;
    use KarimQaderi\Zoroaster\Traits\ResourceRequest as TraitsResourceRequest;

    class ResourceRequest
    {
        use TraitsResourceRequest , Builder;

        function authorizeTo($authorize)
        {
            if(!$authorize)
                abort(401);
        }


        /**
         * @return \Illuminate\Database\Eloquent\Model
         */
        function getModelAndWhereTrashed()
        {
            if(method_exists($this->Resource()->newModel() , 'isForceDeleting'))
                return $this->Resource()->newModel()->withTrashed();
            else
                return $this->Resource()->newModel();
        }

        function isForceDeleting()
        {
            return method_exists($this->Resource()->newModel() , 'isForceDeleting');
        }

    }