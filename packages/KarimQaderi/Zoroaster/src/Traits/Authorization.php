<?php

    namespace KarimQaderi\Zoroaster\Traits;


    trait Authorization
    {


        /**
         * @return bool
         */
        public function authorizeToView()
        {
            return true;
        }

        /**
         * @return bool
         */
        public function authorizeToCreate()
        {
            return true;
        }

        /**
         * @return bool
         */
        public function authorizeToUpdate()
        {
            return true;
        }

        /**
         * @return bool
         */
        public function authorizeToDelete()
        {
            return true;
        }

        /**
         * @return bool
         */
        public function authorizedToAdd()
        {
            return true;
        }

    }