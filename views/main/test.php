<pre>
    <?php
        use app\utils\metrCatalogUpdate\MetrCatalogGetter;
        $catalogGetter = new MetrCatalogGetter();
        print_r($catalogGetter->get(MetrCatalogGetter::PROPERTIES));
    ?>
</pre>