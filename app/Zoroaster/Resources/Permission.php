<?php

    namespace App\Zoroaster\Resources;

    use KarimQaderi\Zoroaster\Abstracts\ZoroasterResource;
    use KarimQaderi\Zoroaster\Fields\btnSave;
    use KarimQaderi\Zoroaster\Fields\CreateAndAddAnotherOne;
    use KarimQaderi\Zoroaster\Fields\Group\Panel;
    use KarimQaderi\Zoroaster\Fields\Group\RowOneCol;
    use KarimQaderi\Zoroaster\Fields\ID;
    use KarimQaderi\Zoroaster\Fields\Text;


    class Permission extends ZoroasterResource
    {
        /**
         * The model the resource corresponds to.
         *
         * @var string
         */
        public static $model = 'KarimQaderi\\Zoroaster\\Models\\Permission';

        /**
         * The single value that should be used to represent the resource when being displayed.
         *
         * @var string
         */
        public $title = 'name';

        public $labels = 'مجوز ها';
        public $label = 'مجوز';

        /**
         * The columns that should be searched.
         *
         * @var array
         */
        public $search = [
            'id' ,
        ];

        /**
         * Get the fields displayed by the resource.
         *
         * @return array
         */
        public function fields()
        {
            return [

                new RowOneCol([
                    new Panel('' , [

                        ID::make()->rules('required')->sortable()->onlyOnIndex() ,
                        Text::make('نام' , 'name')->rules('required') ,
                        Text::make('نام نمایشی' , 'display_name')->rules('required') ,
                    ]) ,

                    new Panel('' , [
                        btnSave::make() ,
                        CreateAndAddAnotherOne::make() ,
                    ]) ,
                ]) ,

            ];
        }

        public function filters()
        {

        }


    }
