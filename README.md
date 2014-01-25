Phatic Compressor Extension
=====================

Compress the HTML output

It depends on the Phatic Blog Extension package

Configure phatic.yml:

    config:
      extensions:
        MagdKudama\PhaticBlogExtension\PhaticBlogExtension:
          base_url: 'http://myurl.com'
          permalink:
            type: 'date'
            param: 'Y/m'
        MagdKudama\PhaticBlogExtension\PhaticCompressorExtension: ~

More documentation is coming...

Contributors
------------

- Magd Kudama [magdkudama] [lead developer]