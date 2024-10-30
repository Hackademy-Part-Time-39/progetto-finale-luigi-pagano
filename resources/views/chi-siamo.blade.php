<x-layout>
    <div class="container my-5 py-5">
        <!-- Background and Title -->
        <h1 class="text-center mb-4 display-4 text-primary">Chi Siamo</h1>

        <!-- Content Section with Flexbox and Spacing Improvements -->
        <div class="row align-items-center">
            <!-- Text Column -->
            <div class="col-md-6 mb-4">
                <p class="lead">
                    <strong>Luigi, Alessia, e Ludovica</strong>: siamo una famiglia che ama la buona cucina. Cucinare ci
                    rilassa e ci diverte. Sperimentiamo e creiamo ricette guidate da una filosofia comune: piatti belli
                    da vedere e buoni da mangiare. La ricerca e l’osservazione fanno parte di noi.
                </p>
                
                <!-- Subsection with Larger Heading and Highlighted Points -->
                <h3 class="text-center my-4 text-success">Cosa aspettarsi da questo blog di cucina?</h3>
                <p class="lead">
                    Questo blog è stato pensato per chi ama cucinare e sperimentare ricette di diverse difficoltà, che
                    stupiscano per bellezza e gusto.
                </p>
                <ul class="list-unstyled ms-3">
                    <li><strong>Ricette gourmet fatte in casa</strong> - soluzioni e trucchi per rendere gourmet ogni piatto, senza attrezzatura professionale.</li>
                    <li><strong>Finger food e stuzzichini creativi</strong> - perfetti per aggiungere varietà in tavola.</li>
                    <li><strong>Sapori dal mondo</strong> - ricette ispirate dai nostri viaggi internazionali.</li>
                    <li><strong>Esperimenti culinari</strong> - repliche di piatti di grandi Chef senza attrezzature complesse!</li>
                </ul>
            </div>

            <!-- Image Column with Placeholder -->
            <div class="col-md-6 text-center">
                <img src="/chisiamo/immaginechisiamo.jpg" alt="Chi Siamo" class="img-fluid rounded shadow-lg mb-4" style="max-width: 90%; object-fit: cover;">
            </div>
        </div>

        <!-- Button to Return to Home -->
        <div class="col-12 text-center mt-5">
            <a href="{{ url('/') }}" class="btn btn-primary btn-lg px-4 py-2">Torna alla Home</a>
        </div>
    </div>
</x-layout>
