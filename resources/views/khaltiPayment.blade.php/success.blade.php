
<!DOCTYPE html>
<html>
  <head>
    <base href="/" />

    <meta charset="UTF-8" />
    <meta content="IE=Edge" http-equiv="X-UA-Compatible" />
    <meta name="description" content="Khalti API" />

    <link
      rel="apple-touch-icon"
      sizes="57x57"
      href="/favicons/apple-icon-57x57.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="60x60"
      href="/favicons/apple-icon-60x60.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="72x72"
      href="/favicons/apple-icon-72x72.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="/favicons/apple-icon-76x76.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="114x114"
      href="/favicons/apple-icon-114x114.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="120x120"
      href="/favicons/apple-icon-120x120.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="144x144"
      href="/favicons/apple-icon-144x144.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="152x152"
      href="/favicons/apple-icon-152x152.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="/favicons/apple-icon-180x180.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="192x192"
      href="/favicons/android-icon-192x192.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="/favicons/favicon-32x32.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="96x96"
      href="/favicons/favicon-96x96.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="/favicons/favicon-16x16.png"
    />
    <link rel="manifest" href="/manifest.json" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png" />
    <meta name="theme-color" content="#ffffff" />

    <title>Khalti</title>
    <link rel="manifest" href="manifest.json" />

    <style>
      body {
        height: 100vh;
        width: 100vw;
        background-color: #f6f4f9;
      }
      .container {
        width: 100vw;
        height: 100vh;
        display: flex; /* Default Axis is X*/
        justify-content: center; /* Main Axis */
        align-items: center; /* Cross Axis */
      }
      .indicator {
        width: 50vw;
      }
    </style>
    <script
      src="https://unpkg.com/@lottiefiles/lottie-player@0.3.0/dist/lottie-player.js"
      type="text/javascript"
    ></script>
    <script>
      // Disbale console logs
      console.log = function () {};
      console.debug = function () {};
      const serviceWorkerVersion = "334305124";
    </script>
    <script src="flutter.js" defer></script>
  </head>
  <body style="overflow: hidden">
    <div id="loading_indicator" class="container">
      <lottie-player
        id="loaderPlayer"
        class="indicator"
        src="loader.json"
        style="width: 300px; margin: auto; height: calc(100vh)"
        autoplay
        loop
      >
      </lottie-player>
    </div>
    <script>
      window.addEventListener('load', function (ev) {
        var loading = document.querySelector('#loading_indicator');
        _flutter.loader.loadEntrypoint({
          serviceWorker: {
            serviceWorkerVersion: serviceWorkerVersion,
          },
          onEntrypointLoaded: async function (engineInitializer) {
            let appRunner = await engineInitializer.initializeEngine();
            await appRunner.runApp();
            loading.remove();
          },
        });
      });
    </script>
  </body>
</html>
