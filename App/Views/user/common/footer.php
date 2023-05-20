



 <footer class="main-footer">
   <div style="text-align:center;">
   <?php
   foreach ($lang_list AS $value) { ?>
             <a href="<?php echo url('user/language');echo "/".$value->id; ?>" title="<?php echo $value->name; ?>" style="<?php if ($value->id==$active_lang_id) echo "background-color:rgba(141, 217, 140, 0.41);"; ?>">
              <?php echo $value->name; ?>
             </a>

         <?php
        }
          ?>
</div>

 </footer>

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
   <!-- Control sidebar content goes here -->
 </aside>
 <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->





<div class="modal fade" id="user-profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel"><?php echo $lang["edit_profile"]; ?></h4>
    </div>
    <div class="modal-body">
        <form action="<?php echo url('/user/profile/update'); ?>" class="form-modal form">
        <div id="form-results"></div>
        <div class="form-group col-sm-6">
          <label for="first_name"><?php echo $lang["name"]; ?></label>
          <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $user->first_name; ?>" placeholder="<?php echo $lang["name"]; ?>">
        </div>
        <div class="form-group col-sm-6">
          <label for="last_name"> <?php echo $lang["family"]; ?></label>
          <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $user->last_name; ?>" placeholder="<?php echo $lang["last_name"]; ?>">
        </div>

        <div class="form-group col-sm-6">
          <label for="email"><?php echo $lang["email"]; ?></label>
          <input type="email" class="form-control" name="email" id="email" value="<?php echo $user->email; ?>" placeholder="<?php echo $lang["email"]; ?>">
        </div>

        <div class="form-group col-sm-6">
          <label for="password"> <?php echo $lang["password"]; ?></label>
          <input type="password" class="form-control" name="password" id="password" placeholder=" <?php echo $lang["password"]; ?>">
        </div>

        <div class="form-group col-sm-6">
          <label for="confirm_password"> <?php echo $lang["confirm_password"]; ?> </label>
          <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder=" <?php echo $lang["confirm_password"]; ?>">
        </div>

        <div class="form-group col-sm-6">
            <label for="status"> <?php echo $lang["birthday"]; ?></label>
            <input type="text" name="birthday" placeholder="<?php echo $lang["birthday"]; ?>" class="form-control" value="<?php echo $user->birthday; ?>" />
        </div>

        <div class="form-group col-sm-6">
            <label for="gender"><?php echo $lang["gender"]; ?></label>
            <select class="form-control" id="gender" name="gender">
                <option value="male"><?php echo $lang["male"]; ?> </option>
                <option value="female" <?php echo $user->gender == 'female' ? 'selected': false; ?>><?php echo $lang["female"]; ?></option>
            </select>
        </div>

        <div class="clearfix"></div>

        <div class="form-group col-sm-6">
            <label for="image"> <?php echo $lang["image_profile"]; ?></label>
            <input type="file" name="image" />
        </div>

        <?php if ($user->image) { ?>
        <div class="form-group col-sm-6">
            <img src="<?php echo assets('images/' . $user->image); ?>" style="width:50px; height: 50px;" alt="" />
        </div>
        <?php } ?>

        <div class="clearfix"></div>

        <br>
          <button class="btn btn-info submit-btn"><?php echo $lang["submit"]; ?></button>
        </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $lang["close"]; ?></button>
    </div>
  </div>
</div>
</div>






<!-- jQuery UI 1.11.4 -->
<script src="<?php echo assets('user/plugins/jquery-ui/jquery-ui.min.js');?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="<?php echo assets('user/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- ChartJS -->

<!-- JQVMap -->
<script src="<?php echo assets('user/plugins/jqvmap/jquery.vmap.min.js');?>"></script>
<script src="<?php echo assets('user/plugins/jqvmap/maps/jquery.vmap.world.js');?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo assets('user/plugins/jquery-knob/jquery.knob.min.js');?>"></script>
<!-- daterangepicker -->
<script src="<?php echo assets('user/plugins/moment/moment.min.js');?>"></script>
<script src="<?php echo assets('user/plugins/daterangepicker/daterangepicker.js');?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo assets('user/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js');?>"></script>
<!-- Summernote -->
<script src="<?php echo assets('user/plugins/summernote/summernote-bs4.js');?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo assets('user/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo assets('user/adminlte-3/js/adminlte.js');?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo assets('user/adminlte-3/js/pages/dashboard.js');?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo assets('user/adminlte-3/js/demo.js');?>"></script>

<script src="<?php echo assets('user/js/custom.js'); ?>"></script>

<script>


function remove(table,col,id)
{

  $.ajax({
      url:'<?php echo url("user/exams/remove"); ?>',
      type: 'POST',
      data: {table:table,col:col,id:id},
      dataType: 'JSON',
      beforeSend: function () {
          $('#results').removeClass().addClass('alert alert-info').html('<?php echo $lang["sending_request"]; ?>');
      },
      success: function(results) {
            alert("<?php echo $lang["delete_success"];?>");
      }
  });

}


(function (factory) {
    /* Global define */
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define(['jquery'], factory);
    } else if (typeof module === 'object' && module.exports) {
        // Node/CommonJS
        module.exports = factory(require('jquery'));
    } else {
        // Browser globals
        factory(window.jQuery);
    }
}(function ($) {
    $.extend(true, $.summernote.lang, {
        'en-US': {
            audio: {
                audio: 'Audio',
                insert: 'Insert Audio',
                selectFromFiles: 'Select from files',
                url: 'Audio URL',
                maximumFileSize: 'Maximum file size',
                maximumFileSizeError: 'Maximum file size exceeded.'
            }
        },
        'nl-NL': {
            audio: {
                audio: 'Audio',
                insert: 'Audio invoegen',
                selectFromFiles: 'Selecteer een bestand',
                url: 'URL van de audio',
                maximumFileSize: 'Maximale bestandsgrootte',
                maximumFileSizeError: 'Bestand te groot.'
            }
        },
    });

    $.extend($.summernote.options, {
        audio: {
            icon: '<i class="note-icon-audio"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 75 75" width="12px" height="12px"><g id="g1"><polygon id="polygon1" points="39.389,13.769 22.235,28.606 6,28.606 6,47.699 21.989,47.699 39.389,62.75 39.389,13.769" style="stroke:#111111;stroke-width:5;stroke-linejoin:round;fill:#111111;" /><path id="path1" d="M 48.128,49.03 C 50.057,45.934 51.19,42.291 51.19,38.377 C 51.19,34.399 50.026,30.703 48.043,27.577" style="fill:none;stroke:#111111;stroke-width:5;stroke-linecap:round"/><path id="path2" d="M 55.082,20.537 C 58.777,25.523 60.966,31.694 60.966,38.377 C 60.966,44.998 58.815,51.115 55.178,56.076" style="fill:none;stroke:#111111;stroke-width:5;stroke-linecap:round"/><path id="path1" d="M 61.71,62.611 C 66.977,55.945 70.128,47.531 70.128,38.378 C 70.128,29.161 66.936,20.696 61.609,14.01" style="fill:none;stroke:#111111;stroke-width:5;stroke-linecap:round"/></g></svg></i>'
        },
        callbacks: {
            onAudioUpload: null,
            onAudioUploadError: null,
            onAudioLinkInsert: null
        }
    });

    $.extend($.summernote.plugins, {
        /**
         *  @param {Object} context - context object has status of editor.
         */
        'audio': function (context) {
            var self = this,
                    // ui has renders to build ui elements
                    // for e.g. you can create a button with 'ui.button'
                    ui = $.summernote.ui,
                    $note = context.layoutInfo.note,
                    // contentEditable element
                    $editor = context.layoutInfo.editor,
                    $editable = context.layoutInfo.editable,
                    $toolbar = context.layoutInfo.toolbar,
                    // options holds the Options Information from Summernote and what we extended above.
                    options = context.options,
                    // lang holds the Language Information from Summernote and what we extended above.
                    lang = options.langInfo;

            context.memo('button.audio', function () {
                // Here we create a button
                var button = ui.button({

                    // icon for button
                    contents: options.audio.icon,

                    // tooltip for button
                    tooltip: lang.audio.audio,
                    click: function (e) {
                        context.invoke('audio.show');
                    }
                });
                return button.render();
            });

            this.initialize = function () {

                // This is how we can add a Modal Dialog to allow users to interact with the Plugin.

                // get the correct container for the plugin how it's attached to the document DOM.
                var $container = options.dialogsInBody ? $(document.body) : $editor;

                var audioLimitation = '';
                if (options.maximumAudioFileSize) {
                    var unit = Math.floor(Math.log(options.maximumAudioFileSize) / Math.log(1024));
                    var readableSize = (options.maximumAudioFileSize / Math.pow(1024, unit)).toFixed(2) * 1 +
                            ' ' + ' KMGTP'[unit] + 'B';
                    audioLimitation = '<small>' + lang.audio.maximumFileSize + ' : ' + readableSize + '</small>';
                }

                // Build the Body HTML of the Dialog.
                var body = [
                    '<div class="form-group note-form-group note-group-select-from-files">',
                    '<label class="note-form-label">' + lang.audio.selectFromFiles + '</label>',
                    '<input class="note-audio-input note-form-control note-input" ',
                    ' type="file" name="files" accept="audio/*" multiple="multiple" />',
                    '</div>',
                    audioLimitation,
                    '<div class="form-group note-group-image-url" style="overflow:auto;">',
                    '<label class="note-form-label">' + lang.audio.url + '</label>',
                    '<input class="note-audio-url form-control note-form-control note-input ',
                    ' col-md-12" type="text" />',
                    '</div>'
                ].join('');

                // Build the Footer HTML of the Dialog.
                var footer = '<button href="#" class="btn btn-primary note-audio-btn">' + lang.audio.insert + '</button>';

                this.$dialog = ui.dialog({

                    // Set the title for the Dialog. Note: We don't need to build the markup for the Modal
                    // Header, we only need to set the Title.
                    title: lang.audio.insert,

                    // Set the Body of the Dialog.
                    body: body,

                    // Set the Footer of the Dialog.
                    footer: footer

                            // This adds the Modal to the DOM.
                }).render().appendTo($container);
            };

            this.destroy = function () {
                ui.hideDialog(this.$dialog);
                this.$dialog.remove();
            };

            this.bindEnterKey = function ($input, $btn) {
                $input.on('keypress', function (event) {
                    if (event.keyCode === 13)
                        $btn.trigger('click');
                });
            };

            this.bindLabels = function () {
                self.$dialog.find('.form-control:first').focus().select();
                self.$dialog.find('label').on('click', function () {
                    $(this).parent().find('.form-control:first').focus();
                });
            };

            /**
             * @method readFileAsDataURL
             *
             * read contents of file as representing URL
             *
             * @param {File} file
             * @return {Promise} - then: dataUrl
             *
             * @todo this method already exists in summernote.js so we should use that one
             */
            this.readFileAsDataURL = function (file) {
                return $.Deferred(function (deferred) {
                    $.extend(new FileReader(), {
                        onload: function (e) {
                            var dataURL = e.target.result;
                            deferred.resolve(dataURL);
                        },
                        onerror: function (err) {
                            deferred.reject(err);
                        }
                    }).readAsDataURL(file);
                }).promise();
            };

            this.createAudio = function (url) {
                // audio url patterns (mp3, ogg)
                var mp3RegExp = /^.+.(mp3)$/;
                var mp3Match = url.match(mp3RegExp);

                var oggRegExp = /^.+.(ogg|oga)$/;
                var oggMatch = url.match(oggRegExp);

                var base64RegExp = /^data:(audio\/mpeg|audio\/ogg).+$/;
                var base64Match = url.match(base64RegExp);

                var $audio;
                if (mp3Match || oggMatch || base64Match) {
                    $audio = $('<audio controls>')
                            .attr('src', url);
                } else {
                    // this is not a known audio link. Now what, Cat? Now what?
                    return false;
                }

                $audio.addClass('note-audio-clip');

                return $audio;
            };

            this.insertAudio = function (src, param) {
                var $audio = self.createAudio(src);

                if (!$audio) {
                    context.triggerEvent('audio.upload.error');
                }

                context.invoke('editor.beforeCommand');

                if (typeof param === 'string') {
                    $audio.attr('data-filename', param);
                }

                $audio.show();
                context.invoke('editor.insertNode', $audio[0]);

                context.invoke('editor.afterCommand');
            };

            this.insertAudioFilesAsDataURL = function (files) {
                $.each(files, function (idx, file) {
                    var filename = file.name;
                    if (options.maximumAudioFileSize && options.maximumAudioFileSize < file.size) {
                        context.triggerEvent('audio.upload.error', lang.audio.maximumFileSizeError);
                    } else {
                        self.readFileAsDataURL(file).then(function (dataURL) {
                            return self.insertAudio(dataURL, filename);
                        }).fail(function () {
                            context.triggerEvent('audio.upload.error');
                        });
                    }
                });
            };

            this.show = function (data) {
                context.invoke('editor.saveRange');
                this.showAudioDialog().then(function (data) {
                    // [workaround] hide dialog before restore range for IE range focus
                    ui.hideDialog(self.$dialog);
                    context.invoke('editor.restoreRange');

                    if (typeof data === 'string') { // audio url
                        // If onAudioLinkInsert set
                        if (options.callbacks.onAudioLinkInsert) {
                            context.triggerEvent('audio.link.insert', data);
                        } else {
                            self.insertAudio(data);
                        }
                    } else { // array of files
                        // If onAudioUpload set
                        if (options.callbacks.onAudioUpload) {
                            context.triggerEvent('audio.upload', data);
                        } else {
                            // else insert Audio as dataURL
                            self.insertAudioFilesAsDataURL(data);
                        }
                    }
                }).fail(function () {
                    context.invoke('editor.restoreRange');
                });
            };
            this.showAudioDialog = function () {
                return $.Deferred(function (deferred) {
                    var $audioInput = self.$dialog.find('.note-audio-input');
                    var $audioUrl = self.$dialog.find('.note-audio-url');
                    var $audioBtn = self.$dialog.find('.note-audio-btn');

                    ui.onDialogShown(self.$dialog, function () {
                        context.triggerEvent('dialog.shown');

                        // Cloning AudioInput to clear element.
                        $audioInput.replaceWith($audioInput.clone().on('change', function(event) {
                            deferred.resolve(event.target.files || event.target.value);
                        }).val(''));

                        $audioBtn.click(function (e) {
                            e.preventDefault();
                            deferred.resolve($audioUrl.val());
                        });

                        $audioUrl.on('keyup paste', function() {
                            var url = $audioUrl.val();
                            ui.toggleBtn($audioBtn, url);
                        }).val('');

//                        if (!env.isSupportTouch) {
//                            $audioUrl.trigger('focus');
//                        }
                        self.bindEnterKey($audioUrl, $audioBtn);
                        self.bindLabels();
                    });
                    ui.onDialogHidden(self.$dialog, function () {
                        $audioInput.off('change');
                        $audioUrl.off('keyup paste keypress');
                        $audioBtn.off('click');
                        if(options.dialogsInBody){
                          $('body').addClass('modal-open');
                        }
                        if (deferred.state() === 'pending')
                            deferred.reject();
                    });
                    ui.showDialog(self.$dialog);
                });
            };
        }
    });
}));





















$(document).ready(function() {
    $('.description').summernote({
      dialogsInBody: true,
      toolbar: [
    ['style', ['style']],
    ['font-style', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
    ['font', ['fontname']],
    ['font-size',['fontsize']],
    ['font-color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'video', 'hr','audio']],
    ['misc', ['fullscreen', 'codeview', 'help']]
  ]
    });
    });
    // Steps to set the active sidebar link
    // 1- Get the current url
    var currentUrl = window.location.href;
    // 2- Get the last segment of the url
    var segment = currentUrl.split('/').pop();
    // 3- Add the "active" class to the id in sidebar of the current url
    $('#' + segment + '-link').addClass('active');

    $('.open-popup').on('click', function () {
        btn = $(this);
        url = btn.data('target');

        modalTarget = btn.data('modal-target');
        // remove the target from the page

        $(modalTarget).remove();

        $.ajax({
            url: url,
            type: 'POST',
            success: function (html) {
                $('body').append(html);
                $(modalTarget).modal('show');
            },
        });
               /*
        if ($(modalTarget).length > 0) {
            $(modalTarget).modal('show');
        } else {
            $.ajax({
                url: url,
                type: 'POST',
                success: function (html) {
                    $('body').append(html);
                    $(modalTarget).modal('show');
                },
            });
        }
*/
        return false;
    });




    /* Deleting */
    $('.delete').on('click', function (e) {
        e.preventDefault();

        button = $(this);

        var c = confirm('<?php echo $lang["are_you_sure"]; ?>');

        if (c === true) {
            $.ajax({
                url: button.data('target'),
                type: 'POST',
                dataType: 'JSON',
                beforeSend: function () {
                    $('#results').removeClass().addClass('alert alert-info').html('<?php echo $lang["sending_request"]; ?>');
                },
                success: function(results) {
                    if (results.success) {
                        $('#results').removeClass().addClass('alert alert-success').html(results.success);
                        tr = button.parents('tr');

                        tr.fadeOut(function () {
                           tr.remove();
                        });
                    }
                }
            });
        } else {
            return false;
        }
    });

    /* dont_publish */
    $('.dont_publish').on('click', function (e) {
        e.preventDefault();

        button = $(this);

        var c = confirm('<?php echo $lang["are_you_sure"]; ?>');

        if (c === true) {
            $.ajax({
                url: button.data('target'),
                type: 'POST',
                dataType: 'JSON',
                beforeSend: function () {
                    $('#results').removeClass().addClass('alert alert-info').html('<?php echo $lang["sending_request"]; ?>');
                },
                success: function(results) {
                    if (results.success) {
                        $('#results').removeClass().addClass('alert alert-success').html(results.success);
                        location.reload();


                    }
                }
            });
        } else {
            return false;
        }
    });

    $('.important').on('click', function (e) {
        e.preventDefault();

        button = $(this);


        var is_sort_temp = prompt("<?php echo $lang["is_sort_number"]; ?>", "");
        if (is_sort_temp == null || is_sort_temp == "") {
          txt = "User cancelled the prompt.";
        } else {

          $.ajax({
              url: button.data('target'),
              type: 'POST',
              dataType: 'JSON',
              data: {is_sort: is_sort_temp},
              beforeSend: function () {
                  $('#results').removeClass().addClass('alert alert-info').html('<?php echo $lang["sending_request"]; ?>');
              },
              success: function(results) {
                  if (results.success) {
                      $('#results').removeClass().addClass('alert alert-success').html(results.success);

                      if (button.css('color') == 'rgb(255, 255, 255)')
                      {
                              button.css('color','yellow');

                      }
                      else
                      {
                             button.css('color','white');
                      }
                      location.reload();



                  }
              }
                      });

            }

    });
    $('.default').on('click', function (e) {
        e.preventDefault();

        button = $(this);

            var c = confirm('<?php echo $lang["are_you_sure"]; ?>');

        if (c === true) {
            $.ajax({
                url: button.data('target'),
                type: 'POST',
                dataType: 'JSON',
                beforeSend: function () {
                    $('#results').removeClass().addClass('alert alert-info').html('<?php echo $lang["sending_request"]; ?>');
                },
                success: function(results) {
                    if (results.success) {
 location.reload();

                    }
                }
            });
        } else {
            return false;
        }
    });
    $('.publish').on('click', function (e) {
        e.preventDefault();

        button = $(this);

          var c = confirm('<?php echo $lang["are_you_sure"]; ?>');

        if (c === true) {
            $.ajax({
                url: button.data('target'),
                type: 'POST',
                dataType: 'JSON',
                beforeSend: function () {
                    $('#results').removeClass().addClass('alert alert-info').html('<?php echo $lang["sending_request"]; ?>');
                },
                success: function(results) {
                    if (results.success) {
                      $('#results').removeClass().addClass('alert alert-success').html(results.success);
                      location.reload();


                    }
                }
            });
        } else {
            return false;
        }
    });


    var url = window.location;
    $('ul.nav-sidebar a').filter(function() {
        return this.href == url;
    }).addClass('active');
    $('ul.nav-treeview a').filter(function() {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open') .prev('a').addClass('active');


    var acc = document.getElementsByClassName("accordion");
        var i;
        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight){
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }




        $(function () {

            // submit form
            $(document).on('click', '.submit-btn', function (e) {


              btn = $(this);

                e.preventDefault();

                form = btn.parents('.form');

                // check if the form inputs values are the same as thier palceholders
                // if so, then we will just make them empty

                form.find('input').each(function () {
                    input = $(this);
                    placeholder = input.attr('data-placeholder');

                    if (! placeholder) return false;

                    if (input.val() == placeholder) {
                        input.val('');
                    }
                });

                url = form.attr('action');

                data = new FormData(form[0]);
                formResults = form.find('#form-results');

                $.ajax({
                    url: url,
                    data: data,
                    type: 'POST',
                    dataType: 'json',
                    beforeSend: function () {
                        formResults.removeClass().addClass('alert alert-info').html('<?php echo $lang["sending_a_request"]; ?>');
                    },
                    success: function(results) {

                        if (results.errors) {
                            formResults.removeClass().addClass('alert alert-danger').html(results.errors);
                        } else if (results.success) {
                            formResults.removeClass().addClass('alert alert-success').html(results.success);
                             location.reload();
                        }

                        if (results.redirectTo) {
                            window.location.href = results.redirectTo;
                        }
                    },
                    cache: false,
                    processData: false,
                    contentType: false,
                });
            });
        });



</script>
</body>
</html>
