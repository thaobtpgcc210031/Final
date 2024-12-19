<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documentation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/vendors/codemirror/codemirror.css" />
    <link rel="stylesheet" href="/vendors/codemirror/ambiance.css" />
    <link rel="stylesheet" href="/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.45.0/theme/dracula.min.css">
    <link rel="stylesheet" href="/vendors/pwstabs/jquery.pwstabs.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <link rel="shortcut icon" href="/images/favicon.png" />
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container-fluid documentation">
      <div class="row">
        <div class="col-md-3 col-xl-2 left-sidebar">
          <div class="logo-wrapper">
            <a href="../index.php">
              <img src="/images/logo.svg" alt="logo">
            </a>
          </div>
          <h5 class="left-menu-title">Documentation</h5>
          <ul class="left-menu">
            <li><a href="#introduction"> Introduction </a></li>
            <li><a href="#getting-started"> Getting started </a>
              <ul>
                <li>
                  <a href="#f-structure">Folder Structure</a>
                </li>
              </ul>
            </li>
            <li><a href="#options"> Options </a></li>
            <li><a href="#customization"> Customization </a>
              <ul class="list-arrow">
                <li>
                  <a href="#build">Build</a>
                </li>
              
                <li>
                  <a href="#sass">Sass</a>
                </li>
              
                <li>
                  <a href="#inject">Inject</a>
                </li>
              
                <li>
                  <a href="#bundleVendors">BundleVendors</a>
                </li>
              </ul>
            </li>
          </ul>
          <h5 class="left-menu-title">Components</h5>
          <ul class="left-menu">
            <li><a href="#basic-ui"> Basic UI Elements </a></li>
            <li><a href="#basic-ui-2"> Basic UI Elements-2 </a></li>
            <li><a href="#advanced-ui"> Advanced UI Elements </a></li>
            <li><a href="#media"> Media </a></li>
            <li><a href="#tables"> Tables </a></li>
            <li><a href="#charts"> Charts </a></li>
            <li><a href="#maps"> Maps </a></li>
            <li><a href="#forms"> Forms </a></li>
            <li><a href="#additional-form"> Additional Form Elements </a></li>
            <li><a href="#icons"> Icons </a></li>
            <li><a href="#file-upload"> File upload </a></li>
            <li><a href="#form-picker"> Form Picker </a></li>
            <li><a href="#editors"> Editors </a></li>
          </ul>
          <h5 class="left-menu-title"><a class="text-body" href="#credits"> Credits </a></h5>
          <a class="d-block mt-4 text-muted" target="_blank" href="../index.php">Go to Home</a>
        </div>
        <div class="col-md-9 col-xl-10 main-panel bg-white">
          <div class="main-panel-wrapper">
            <div class="row">
              <div class="col-12 mb-4">
                <h2 class="mt-2 text-center font-weight-light text-muted text-uppercase">Documentation</h2>
              </div>
              <div class="col-12 grid-margin" id="introduction">
                <div class="card">
                  <div class="card-body">
                    <h3 class="mb-4">Introduction</h3>
                    <p>SkyDash Admin is a responsive HTML template that is based on the CSS framework <strong>Bootstrap 5</strong>, and it is built with Sass. Sass compiler makes it easier to code and customize. All Bootstrap components have been modified to fit the style of SkyDash Admin and provide a consistent look throughout the template. Read the documentation of <a href="https://getbootstrap.com/" target="_blank">Bootstrap</a> or <a href="https://sass-lang.com/guide/" target="_blank">Sass</a> if you want to learn more.</p>
                    <p>Before you start working with the template, go through the pages that are bundled with the theme. Most of the template example pages contain quick tips on how to create or use a component, which can be really helpful when you need to create something on the fly.</p>
                    <div class="alert alert-info" role="alert">
                      <p class="d-inline text-danger"><strong>Note</strong>: We are trying our best to document how to use the template. If you think that something is missing from the documentation, please tell us about it. If you have any questions or issues regarding this theme please email us at <a class="d-inline text-info" href="mailto:support@bootstrapdash.com">support@bootstrapdash.com</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-12 grid-margin" id="getting-started">
                  <div class="card">
                    <div class="card-body">
                      <h3 class="mb-4">Getting started</h3>
                      <p>You can directly use the compiled and ready-to-use the version of the template. But in case you plan to customize the template extensively the template allows you to do so.</p>
                      <p>Within the download you'll find the following directories and files, logically grouping common assets and providing both compiled and minified variations:</p>
                      <hr>
                      <h4 class="my-4" id="f-structure">Folder Structure</h4>
                      <details class="mt-4" open>
                        <summary>
                          <i class="fa fa-folder-open-o text-body me-1"></i> <strong>Template Name</strong>
                        </summary>
                        <ul class="list-py-1 list-unstyled ps-4">
                          <li>
                            <details open>
                              <summary>
                                <i class="fa fa-folder-open-o text-body me-1"></i>
                                <strong>dist</strong> - <span class="text-body">contains the distribution files generated from src</span>
                              </summary>
                              <ul class="list-unstyled ps-4">
                                <li>
                                  <details open>
                                    <summary>
                                      <i class="fa fa-folder-open-o text-body me-1"></i>
                                      <strong>themes</strong>
                                    </summary>
                                    <ul>
                                      <li>
                                        <i class="fa fa-folder-open-o text-body me-1"></i>
                                        <strong>assets</strong> - <span class="text-body">common assets for all templates</span>
                                      </li>
                                      <li>
                                        <i class="fa fa-folder-open-o text-body me-1"></i>
                                        <strong>theme_1</strong>
                                      </li>
                                      <li>
                                        <i class="fa fa-folder-open-o text-body me-1"></i>
                                        <strong>theme_2</strong>
                                      </li>
                                    </ul>
                                  </details>
                                </li>
                              </ul>
                          <li><i class="fa fa-html5 me-1"></i> <span>index.php</span></li>
                      </details>
                      </li>
                      </ul>
                      <ul class="list-py-1 list-unstyled ps-4">
                        <li>
                          <i class="fa fa-folder-open-o text-body me-1"></i>
                          <strong>docs</strong> - <span class="text-body">contains the html,css & js files for the documentation</span>
                        </li>
                        <li>
                          <i class="fa fa-folder-open-o text-body me-1"></i>
                          <strong>node_modules</strong> - <span class="text-body">packages installed using npm</span>
                        </li>
                        <li><i class="fa fa-file-code-o me-1"></i> package.json</li>
                      </ul>
                      <ul class="list-py-1 list-unstyled ps-4">
                        <details open>
                          <summary>
                            <i class="fa fa-folder-open-o text-body me-1"></i>
                            <strong>src</strong>
                          </summary>
                          <ul class="list-py-1 list-unstyled ps-4">
                            <details open>
                              <summary>
                                <i class="fa fa-folder-open-o text-body me-1"></i>
                                <strong>assets</strong>
                              </summary>
                              <ul>
                                <li>
                                  <i class="fa fa-folder-open-o text-body me-1"></i>
                                  <strong>css</strong> - <span class="text-body">contains the css files compiled from scss</span>
                                </li>
                                <li>
                                  <i class="fa fa-folder-open-o text-body me-1"></i>
                                  <strong>fonts</strong>
                                </li>
                                <li>
                                  <i class="fa fa-folder-open-o text-body me-1"></i>
                                  <strong>images</strong>
                                </li>
                                <li>
                                  <i class="fa fa-folder-open-o text-body me-1"></i>
                                  <strong>js</strong> - <span class="text-body">js files for core functionality</span>
                                </li>
                                <li>
                                  <i class="fa fa-folder-open-o text-body me-1"></i>
                                  <strong>scss</strong> - <span class="text-body">sass files containing the styles</span>
                                </li>
                                <li>
                                  <i class="fa fa-folder-open-o text-body me-1"></i>
                                  <strong>vendors</strong> - <span class="text-body">all the necessary files copied from node_modules</span>
                                </li>
                              </ul>
                            </details>
                          </ul>
                          <li>
                            <i class="fa fa-folder-open-o text-body me-1"></i>
                            <strong>gulp-task</strong> - <span class="text-body">js files containing specific gulp tasks</span>
                          </li>
                          <li><i class="fa fa-file-code-o me-1"></i> gulpfile.js - <span class="text-body">main gulpfile used to run the tasks</span>
                          </li>
                          <li><i class="fa fa-html5 me-1"></i> index.php</li>
                          <details open>
                            <summary>
                              <i class="fa fa-folder-open-o text-body me-1"></i>
                              <strong>themes</strong> - <span class="text-body">contains all the templates</span>
                            </summary>
                            <ul class="list-py-1 list-unstyled ps-4">
                              <details open>
                                <summary>
                                  <i class="fa fa-folder-open-o text-body me-1"></i>
                                  <strong>theme_1</strong>
                                </summary>
                                <ul class="list-py-1 list-unstyled ps-4">
                                  <li>
                                    <i class="fa fa-folder-open-o text-body me-1"></i>
                                    <strong> pages </strong>
                                  </li>
                                  <li>
                                    <i class="fa fa-folder-open-o text-body me-1"></i>
                                    <strong> partials </strong>
                                  </li>
                                  <li><i class="fa fa-html5 me-1"></i> index.php</li>
                                </ul>
                              </details>
                            </ul>
                          </details>
                      </ul>
                      </details>
                      </details>
                      <p class="mt-1">Note: The root folder denoted further in this documentation refers to the 'template' folder inside the downloaded folder</p>
                      <div class="alert alert-success mt-4 d-flex align-items-center" role="alert">
                        <i class="ti-info-alt"></i>
                        <p>We have bundled up the vendor files needed for demo purpose into a folder 'vendors', you may not need all those vendors in your application. If you want to make any change in the vendor package files, you need to change the src path for related tasks in the file gulpfile.js and run the task <code>bundleVendors</code> to rebuild the vendor files.</p>
                      </div>
                      <hr class="mt-5">
                      <h4 class="mt-4 mb-4">Installation</h4>
                      <p class="mt-2">
                        <strong>Step 1: </strong>To begin, please download and install <a href="https://nodejs.org/en/download" target="_blank">Node.js</a>. If you have already installed it, please proceed to step 2.
                      </p>
                      <p class="mt-2">
                        <strong>Step 2: </strong>Install gulp-cli globally by running <code>npm install -g gulp-cli</code> command. If it's already installed, skip to step 3
                      </p>
                      <p class="mt-2">
                        <strong>Step 3: </strong>To get started, go to the root directory of the project and run the command <code>npm install</code>. This will install the necessary dependencies for the project to run smoothly.
                      </p>
                      <p class="mt-2">
                        <strong>Step 4: </strong>After installing the required dependencies, run <code>cd src</code> to navigate to the src folder and execute the <code>gulp serve</code> command.
                      </p>
                      <div class="alert alert-warning mt-4 text-warning" role="alert">
                        <i class="ti-info-alt"></i> It is important to run <code>gulp serve</code> command from the directory where the gulpfile.js is located.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 grid-margin" id="options">
                  <div class="card">
                    <div class="card-body">
                      <h3 class="card-title">Options</h3>
                      <p> We have provided a bunch of layout options for you with a single class change! You can use the following classes for each layout. </p>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr class="">
                              <th>Layout</th>
                              <th>Class</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Compact menu</td>
                              <td>sidebar-mini</td>
                            </tr>
                            <tr>
                              <td>Icon menu</td>
                              <td>sidebar-icon-only</td>
                            </tr>
                            <tr>
                              <td>Sidebar Hidden (togglable)</td>
                              <td>sidebar-toggle-display, sidebar-hidden</td>
                            </tr>
                            <tr>
                              <td>Sidebar Overlay</td>
                              <td>sidebar-absolute, sidebar-hidden</td>
                            </tr>
                            <tr>
                              <td>Horizontal menu 1</td>
                              <td>horizontal-menu (However, horizontal-menu has different HTML structure. Refer pages/layout/horizontal-menu.php)</td>
                            </tr>
                            <tr>
                              <td>Horizontal menu 2</td>
                              <td>horizontal-menu-2 (However, horizontal-menu-2 has different HTML structure. Refer pages/layout/horizontal-menu-2.php)</td>
                            </tr>
                            <tr>
                              <td>Boxed layout</td>
                              <td>boxed-layout</td>
                            </tr>
                            <tr>
                              <td>RTL layout</td>
                              <td>rtl</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 grid-margin" id="customization">
                  <div class="card">
                    <div class="card-body">
                      <!-- doc starts here -->
                      <h3 class="my-4"> Customization</h3>
                      <hr class="hr">
                      <p>Bootstrapdash offers a flexible foundation for your web projects. This documentation guides you through the customization process, ensuring a seamless experience without modifying the core template files.</p>
                      <div class="alert alert-warning" role="alert">
                        <p class="text-warning">
                          <strong>NOTE:</strong> All major customization should be carried out in the <strong>'src'</strong> file. To avoid overrides of your custom styles, file loss, or any other conflicts during the customization, do not modify the source files of the templates directly; instead, add new files for your customizations.
                        </p>
                      </div>
                      <hr class="hr" id="build">
                      <h4 class="my-4">Build</h4>
                      <p>The command <code>gulp build</code> is used to generate the dist folder. Any changes made to the src should be followed by a build command. Suppose you change or create HTML, Sass or JS files, you have to run the command to ensure that the changes are reflected in the dist folder.</p>
                      <hr class="hr" id="sass">
                      <h4 class="my-4">Sass</h4>
                      <p class="mt-2">
                        <strong>Step 1: </strong>Create a folder named <strong></strong>custom in the <strong class="text-success">assets/scss</strong> directory.
                      </p>
                      <p class="mt-2">
                        <strong>Step 2: </strong>Create new Sass files, preferably <strong>“_custom-variables.scss”</strong> and <strong>“_custom.scss”</strong> and write your styles in them.
                      <div class="alert alert-warning" role="alert">
                        <p class="text-warning"> <strong>NOTE:</strong> Do not name your custom scss files <strong>“_style.scss”</strong> as it will lead to the creation of a new CSS folder. </p>
                      </div>
                      </p>
                      <p class="mt-2">
                        <strong>Step 3: </strong>You can find Sass files for the different layouts in the same scss directory. Now navigate to your preferred layout styles <strong>"_style.scss"</strong> file and import the <strong>_custom-variables.scss</strong> and <strong>_custom.scss</strong>.
                      </p>
                      <p class="mt-2">
                        <strong>Step 4: </strong>Import the variables in the section named <strong class="text-secondary">/* === Import template variables === */</strong> and the styles at the end of the file.
                      </p>
                      <p class="mt-2">
                        <strong>Step 5: </strong>Now run the script <code>gulp sass</code> and your custom styles will be generated.
                      </p>
                      <hr class="hr" id="inject">
                      <h4 class="my-4">Inject</h4>
                      <p class="mt-2">
                        <strong>Step 1: </strong>You can find the common components in their respective partials folder (e.g., navbar, sidebar).
                      </p>
                      <p class="mt-2">
                        <strong>Step 2: </strong>Make changes to these HTML files and inject them into all pages using <code>gulp inject</code>.
                      </p>
                      <p class="mt-2">
                        <strong>Step 3: </strong>Rebuild the dist folder with <code>gulp build</code>.
                      </p>
                      <hr class="hr" id="bundleVendors">
                      <h4 class="my-4">BundleVendors</h4>
                      <p>When you need to add new 3rd party packages to the template or update an existing one, you can do so using the script <code>gulp bundleVendors</code>. This code cleans the existing vendors folder and replaces it with newly updated files. </p>
                      <p>For example: Suppose you want to add a new 3rd party package to your template, you can install them to the project using the command <code>npm
                        install</code>. Your installed package can now be found in the <strong>node_modules</strong>. Now you can import the package as a whole or just the necessary files required for the template to your vendor files located in the assets folder of your project src directory.</p>
                      <p class="mt-2">
                        <strong>Step 1: </strong>Go to the gulp <strong>“vendors.js”</strong> file located in the <strong>“gulp-tasks”</strong> folder in the src.
                      </p>
                      <p class="mt-2">
                        <strong>Step 2: </strong>Add the path to the package files needed from the <strong>node_modules</strong> as a new gulp task like the one given below.
                      <p>
                        <strong class="text-success">1.buildOptionalVendorScripts.</strong>(for js files) <textarea class="multiple-codes">var ascript72 = gulp.src(['../node_modules/jstree/dist/jstree.min.js'])
                              .pipe(gulp.dest(['./assets/vendors/jstree']));
                            </textarea>
                      </p>
                      <p><strong class="text-success">2.buildOptionalVendorStyles.</strong>(for css files)</p>
                      <textarea class="multiple-codes">var aStyle3 = gulp.src(['../node_modules/font-awesome/css/font-awesome.min.css'])
                              .pipe(gulp.dest('./assets/vendors/font-awesome/css'));
                          </textarea>
                      </p>
                      <p class="mt-2">
                        <strong>Step 3: </strong>Add the newly created variable to the return statement given in the respective tasks.
                      </p>
                      <p class="mt-2">
                        <strong>Step 4: </strong>Now run the gulp command <code>gulp bundleVendors</code> to add these to the vendors folder in your asset.
                      </p>
                      <hr class="hr">
                      <h4 class="my-4">Conclusion</h4>
                      <p>With these customization steps, you have the flexibility to tailor Bootstrapdash to meet your specific project requirements. Remember to follow best practices and avoid modifying core template files to ensure smooth updates in the future.</p>
                    </div>
                  </div>
                </div>
                <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <!-- New Docs Starts Here -->
                      <h3 class="mb-4">Components</h3>
                      <hr class="hr" id="basic-ui">
                      <h4 class="my-4">Basic UI Elements</h4>
                      <div class="demo-tabs">
                        <!-- Tabs Starts -->
                        <div data-pws-tab="Button" data-pws-tab-name="Button">
                          <h5 class="mb-2 mt-4">Gradient color</h5>
                          <div class="fluid-container py-4">
                            <button type="button" class="btn btn-gradient-primary">Primary</button>
                            <button type="button" class="btn btn-gradient-secondary">Secondary</button>
                            <button type="button" class="btn btn-gradient-success">Success</button>
                            <button type="button" class="btn btn-gradient-info">Info</button>
                            <button type="button" class="btn btn-gradient-warning">Warning</button>
                            <button type="button" class="btn btn-gradient-danger">Danger</button>
                          </div>
                          <textarea class="multiple-codes">
      <div class="row">
        <button type="button" class="btn btn-gradient-primary">Primary</button>
        <button type="button" class="btn btn-gradient-secondary">Secondary</button>
        <button type="button" class="btn btn-gradient-success">Success</button>
        <button type="button" class="btn btn-gradient-info">Info</button>
        <button type="button" class="btn btn-gradient-warning">Warning</button>
        <button type="button" class="btn btn-gradient-danger">Danger</button>
      </div>
                                        </textarea>
                          <h5 class="mb-2 mt-4">Button with single color</h5>
                          <div class="fluid-container py-4">
                            <button type="button" class="btn btn-primary">Primary</button>
                            <button type="button" class="btn btn-secondary">Secondary</button>
                            <button type="button" class="btn btn-success">Success</button>
                            <button type="button" class="btn btn-info">Info</button>
                            <button type="button" class="btn btn-warning">Warning</button>
                            <button type="button" class="btn btn-danger">Danger</button>
                          </div>
                          <textarea class="multiple-codes">
    <div class="row">
      <button type="button" class="btn btn-primary">Primary</button>
      <button type="button" class="btn btn-secondary">Secondary</button>
      <button type="button" class="btn btn-success">Success</button>
      <button type="button" class="btn btn-info">Info</button>
      <button type="button" class="btn btn-warning">Warning</button>
      <button type="button" class="btn btn-danger">Danger</button>
    </div>
                                      </textarea>
                          <h5 class="mb-2 mt-4">Outlined</h5>
                          <div class="fluid-container py-4">
                            <button type="button" class="btn btn-outline-primary">Primary</button>
                            <button type="button" class="btn btn-outline-secondary">Secondary</button>
                            <button type="button" class="btn btn-outline-success">Success</button>
                            <button type="button" class="btn btn-outline-info">Info</button>
                            <button type="button" class="btn btn-outline-warning">Warning</button>
                            <button type="button" class="btn btn-outline-danger">Danger</button>
                          </div>
                          <textarea class="multiple-codes">
    <div class="row">
      <button type="button" class="btn btn-outline-primary">Primary</button>
      <button type="button" class="btn btn-outline-secondary">Secondary</button>
      <button type="button" class="btn btn-outline-success">Success</button>
      <button type="button" class="btn btn-outline-info">Info</button>
      <button type="button" class="btn btn-outline-warning">Warning</button>
      <button type="button" class="btn btn-outline-danger">Danger</button>
    </div>
                                      </textarea>
                          <h5 class="mb-2 mt-4">Sizes</h5>
                          <div class="fluid-container py-4">
                            <button type="button" class="btn btn-primary btn-lg">Large</button>
                            <button type="button" class="btn btn-primary">Medium</button>
                            <button type="button" class="btn btn-primary btn-sm">Small</button>
                          </div>
                          <textarea class="multiple-codes">
    <div class="row">
      <button type="button" class="btn btn-primary btn-lg">Small</button>
      <button type="button" class="btn btn-secondary">Medium</button>
      <button type="button" class="btn btn-success btn-sm">Large</button>
    </div>
                                      </textarea>
                        </div>
                        <!-- Tabs Ends -->
                        <!-- Tabs Starts -->
                        <div data-pws-tab="Accordions" data-pws-tab-name="Accordions">
                          <h5 class="mb-2 mt-4">Bootstrap Accordion</h5>
                          <div class="fluid-container py-4">
                            <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                              <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                  <h5 class="mb-0">
                                    <a data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Collapsible Group Item #1 </a>
                                  </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                  <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-header" role="tab" id="headingTwo">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> Collapsible Group Item #2 </a>
                                  </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                  <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-header" role="tab" id="headingThree">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> Collapsible Group Item #3 </a>
                                  </h5>
                                </div>
                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                  <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <textarea class="multiple-codes">
    <div id="accordion" class="accordion" role="tablist" aria-multiselectable="true">
      <div class="card">
        <div class="card-header" role="tab" id="headingOne">
          <h5 class="mb-0">
            <a data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Collapsible Group Item #1
            </a>
          </h5>
        </div>
    
        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
          <div class="card-body">
              ....
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" role="tab" id="headingTwo">
          <h5 class="mb-0">
            <a class="collapsed" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Collapsible Group Item #2
            </a>
          </h5>
        </div>
        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
          <div class="card-body">
              ....
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" role="tab" id="headingThree">
          <h5 class="mb-0">
            <a class="collapsed" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Collapsible Group Item #3
            </a>
          </h5>
        </div>
        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
          <div class="card-body">
              ....
          </div>
        </div>
      </div>
    </div>
                                    </textarea>
                        </div>
                        <!-- Tabs Ends -->
                        <!-- Tabs Starts -->
                        <div data-pws-tab="Dropdown" data-pws-tab-name="Dropdown">
                          <h5 class="mb-2 mt-4">Bootstrap Dropdown</h5>
                          <div class="fluid-container py-4">
                            <div class="btn-group">
                              <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                              </div>
                            </div>
                            <div class="btn-group">
                              <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                              </div>
                            </div>
                            <div class="btn-group">
                              <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                              </div>
                            </div>
                            <div class="btn-group">
                              <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                              </div>
                            </div>
                            <div class="btn-group">
                              <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                              </div>
                            </div>
                          </div>
                          <textarea class="multiple-codes">
    <div class="btn-group">
      <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Action
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Separated link</a>
      </div>
    </div>
    <div class="btn-group">
      <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Action
      </button>
      <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Separated link</a>
      </div>
    </div>
    
    <div class="btn-group">
      <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Action
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Separated link</a>
      </div>
    </div>
    
    <div class="btn-group">
      <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Action
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Separated link</a>
      </div>
    </div>
    
    <div class="btn-group">
      <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Action
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Separated link</a>
      </div>
    </div>
                                      </textarea>
                          <h5 class="mb-2 mt-4">Dropdown Outlined</h5>
                          <div class="fluid-container py-4">
                            <div class="btn-group">
                              <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                              </div>
                            </div>
                            <div class="btn-group">
                              <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                              </div>
                            </div>
                            <div class="btn-group">
                              <button type="button" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                              </div>
                            </div>
                            <div class="btn-group">
                              <button type="button" class="btn btn-outline-warning dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                              </div>
                            </div>
                            <div class="btn-group">
                              <button type="button" class="btn btn-outline-danger dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                              </div>
                            </div>
                          </div>
                          <textarea class="multiple-codes">
    <div class="btn-group">
      <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Action
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Separated link</a>
      </div>
    </div>
    <div class="btn-group">
      <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Action
      </button>
      <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Separated link</a>
      </div>
    </div>
    
    <div class="btn-group">
      <button type="button" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Action
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Separated link</a>
      </div>
    </div>
    
    <div class="btn-group">
      <button type="button" class="btn btn-outline-warning dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Action
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Separated link</a>
      </div>
    </div>
    
    <div class="btn-group">
      <button type="button" class="btn btn-outline-danger dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Action
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Separated link</a>
      </div>
    </div>
                                    </textarea>
                        </div>
                        <!-- Tabs Ends -->
                        <!-- Tabs Starts -->
                        <div data-pws-tab="Tabs" data-pws-tab-name="Tabs">
                          <h5 class="mb-2 mt-4">Bootstrap Tabs</h5>
                          <div class="fluid-container py-4">
                            <ul class="nav nav-tabs">
                              <li class="nav-item">
                                <a class="nav-link active" href="#">Active</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link disabled" href="#">Disabled</a>
                              </li>
                            </ul>
                          </div>
                          <textarea class="multiple-codes">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" href="#">Active</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
                                      </textarea>
                        </div>
                        <!-- Tabs Ends -->
                        <!-- Tabs Starts -->
                        <div data-pws-tab="Modals" data-pws-tab-name="Modals">
                          <h5 class="mb-2 mt-4">Bootstrap Modal</h5>
                          <div class="fluid-container py-4">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#defaultModal">Launch demo modal</button>
                            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>This is a modal with default size</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <textarea class="multiple-codes">
    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>This is a modal with default size</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
                                    </textarea>
                        </div>
                        <!-- Tabs Ends -->
                        <!-- Tabs Starts -->
                        <div data-pws-tab="bootstrap-Pagination" data-pws-tab-name="Pagination">
                          <h5 class="mb-2 mt-4">Bootstrap Pagination</h5>
                          <div class="fluid-container py-4">
                            <nav aria-label="Page navigation example">
                              <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                              </ul>
                            </nav>
                          </div>
                          <textarea class="multiple-codes">
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </nav>
                                      </textarea>
                        </div>
                        <!-- Tabs Ends -->
                        <!-- Tabs Starts -->
                        <div data-pws-tab="bootstrap-Badge" data-pws-tab-name="Badge">
                          <h5 class="mb-2 mt-4">Bootstrap Badges</h5>
                          <div class="fluid-container py-4">
                            <div class="badge badge-primary">Default</div>
                            <div class="badge badge-gradient-primary">Gradient</div>
                            <div class="badge badge-primary badge-pill">Pill</div>
                            <div class="badge badge-outline-primary badge-pill">Outlined</div>
                          </div>
                          <textarea class="multiple-codes">
    <div class="badge badge-primary">Default</div>
    <div class="badge badge-gradient-primary">Gradient</div>                                            
    <div class="badge badge-primary badge-pill">Pill</div>
    <div class="badge badge-outline-primary badge-pill">Outlined</div>
                                      </textarea>
                        </div>
                        <!-- Tabs Ends -->
                      </div>
                      <!-- demo-tabs container ends -->
                      <!-- New Docs Ends Here -->
                      <!-- New Docs Starts Here -->
                      <hr class="hr" id="basic-ui-2">
                      <h4 class="my-4">Basic UI Elements - 2</h4>
                      <div class="demo-tabs">
                        <!-- Tabs Starts -->
                        <div data-pws-tab="bootstrap-Breadcrumb" data-pws-tab-name="Breadcrumb">
                          <h5 class="mb-2 mt-4">Bootstrap Breadcrumb</h5>
                          <div class="fluid-container py-4">
                            <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Library</li>
                              </ol>
                            </nav>
                          </div>
                          <textarea class="multiple-codes">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Library</li>
      </ol>
    </nav>
                                      </textarea>
                        </div>
                        <!-- Tabs Ends -->
                        <!-- Tabs Starts -->
                        <div data-pws-tab="bootstrap-Progressbar" data-pws-tab-name="Progressbar">
                          <h5 class="mb-2 mt-4">Bootstrap Progressbar</h5>
                          <div class="fluid-container py-4">
                            <div class="progress progress-md w-50">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                          <textarea class="multiple-codes">
    <div class="progress progress-md">
      <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
                                      </textarea>
                        </div>
                        <!-- Tabs Ends -->
                        <!-- Tabs Starts -->
                        <div data-pws-tab="bootstrap-tooltip" data-pws-tab-name="Tooltip">
                          <h5 class="mb-2 mt-4">Bootstrap Tooltip</h5>
                          <div class="container-fluid py-4">
                            <button class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Basic tooltip">Hover me</button>
                          </div>
                          <p class="pt-4"> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/js/tooltips.js"></script>
    </textarea>
                          <p> To create a clipboard, add the following code: </p>
                          <textarea class="multiple-codes">
    <button class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Basic tooltip">Hover me</button>
    <script>
    $('[data-bs-toggle="tooltip"]').tooltip();
    </script>
                                      </textarea>
                        </div>
                        <!-- Tabs Ends -->
                      </div>
                      <!-- demo-tabs container ends -->
                      <!-- New Docs Ends Here -->
                      <!-- New Docs Starts Here -->
                      <hr class="hr" id="advanced-ui">
                      <h4 class="my-4">Advanced UI Elements</h4>
                      <div class="demo-tabs">
                        <!-- Tabs Starts -->
                        <div data-pws-tab="Clipboard" data-pws-tab-name="Clipboard">
                          <p>
                            <a href="https://clipboardjs.com/">Clipboard</a>, a modern approach to copy text to clipboard.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/clipboard/dist/clipboard.min.js"></script>
                                      </textarea>
                          <p> To create a clipboard, add the following code: </p>
                          <textarea class="multiple-codes">
    <textarea id="clipboardExample2" class="form-control">Hello&lt;/textarea&gt;
    <button type="button" class="btn btn-primary btn-clipboard" data-clipboard-action="copy" data-clipboard-target="#clipboardExample2">Copy</button>
    <button type="button" class="btn btn-danger btn-clipboard" data-clipboard-action="cut" data-clipboard-target="#clipboardExample2">Cut</button>
    
    <script>
    var clipboard = new Clipboard('.btn-clipboard');
    clipboard.on('success', function(e) {
      console.log(e);
    });
    clipboard.on('error', function(e) {
      console.log(e);
    });
    </script>
                                      </textarea>
                        </div>
                        <!-- Tabs Ends -->
                        <!-- Tabs Starts -->
                        <div data-pws-tab="TodoList" data-pws-tab-name="Todo List">
                          <p>
                            <a href="http://www.jqueryscript.net/demo/Minimal-To-do-List-Task-Manager-App-Using-jQuery-Local-Storage/">Todolist</a> is a minimal jQuery plugin to create checklist.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/js/todolist.js"></script>
                                      </textarea>
                          <p> To create a filterable list, add the following code: </p>
                          <textarea class="multiple-codes">
    <div class="add-items d-flex">
      <input type="text" class="form-control todo-list-input"  placeholder="What do you need to do today?">
      <button class="add btn btn-primary font-weight-bold todo-list-add-btn" id="add-task">Add</button>
    </div>
    <div class="list-wrapper">
      <ul class="d-flex flex-column-reverse todo-list">
        <li>
          <div class="form-check">
            <label class="form-check-label">
              <input class="checkbox" type="checkbox">
              Meeting with Alisa
            </label>
          </div>
          <i class="remove mdi mdi-close-circle-outline"></i>
        </li>
        <li>
          ...
        </li>
        <li>
          ...
        </li>
        <li>
          ...
        </li>
      </ul>
    </div>
                                      </textarea>
                        </div>
                        <!-- Tabs Ends -->
                        <!-- Tabs Starts -->
                        <div data-pws-tab="Dragula" data-pws-tab-name="Dragula">
                          <p>
                            <a href="https://bevacqua.github.io/dragula/">Dragula</a> ,Drag and drop so simple it hurts.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use Dragula in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/dragula/dist/dragula.min.css" />
                                      </textarea>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/dragula/dist/dragula.min.js"></script>
                                      </textarea>
                          <p> To create a drag n drop list, add the following code: </p>
                          <textarea class="multiple-codes">
    <div id="dragula-event-left" class="h-100">
      <div>
      Drag me!
      </div>
    </div>
    <div id="dragula-event-right" class="h-100">
      <div>
      Drag me!
      </div>
    </div>
    
    <script>
    (function($) {
      dragula([document.getElementById("dragula-left"), document.getElementById("dragula-right")]);
      dragula([document.getElementById("dragula-event-left"), document.getElementById("dragula-event-right")])
      .on('drop', function(el) {
        el.className += ' bg-danger';
      })
    })(jQuery);
    </script>
                                    </textarea>
                        </div>
                        <!-- Tabs Ends -->
                        <!-- Tabs Starts -->
                        <div data-pws-tab="context-menu" data-pws-tab-name="ContextMenu">
                          <p> The contextMenu Plugin was designed for web applications in need of menus on a possibly large amount of objects. <a target="_blank" href="https://swisnl.github.io/jQuery-contextMenu/">Click Here</a> to see the official documentation. </p>
                        </div>
                        <!-- Tabs Ends -->
                        <!-- Ui-slider Starts -->
                        <div data-pws-tab="UISlider" data-pws-tab-name="UI Slider">
                          <p>
                            <a href="https://refreshless.com/nouislider/">noUiSlider</a> is a range slider without bloat.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use NoUISlider in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/nouislider/distribute/nouislider.min.css" /></textarea>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/nouislider/distribute/nouislider.min.js"></script></textarea>
                          <p> To create a slider, add the following code: </p>
                          <textarea class="multiple-codes">
    <div id="ui-slider" class="slider"></div>
    
    <script>
    var startSlider = document.getElementById('ui-slider');
    noUiSlider.create(startSlider, {
    start: [20, 80],
    range: {
      'min': [0],
      'max': [100]
    }
    });
    </script></textarea>
                        </div>
                        <!-- Ui slider Ends -->
                        <!-- Tabs Starts -->
                        <div data-pws-tab="Range-slider" data-pws-tab-name="Range Slider">
                          <p> Easy, flexible and responsive range slider with skin support. <a target="_blank" href="http://ionden.com/a/plugins/ion.rangeSlider/en.php">Click Here</a> to see the official documentation. </p>
                        </div>
                        <!-- Tabs Ends -->
                        <!-- Tabs Starts -->
                        <div data-pws-tab="Colgade" data-pws-tab-name="Colcade Grid">
                          <p>
                            <a href="https://github.com/desandro/colcade">Colcade</a> is a simple lightweight masonry layout.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/colcade/colcade.js"></script>
                                            </textarea>
                          <p> To create a responsive, add the following code: </p>
                          <textarea class="multiple-codes">
    <div class="grid">
      <div class="grid-col grid-col--1"></div>
      <div class="grid-col grid-col--2"></div>
      <div class="grid-col grid-col--3"></div>
      <div class="grid-col grid-col--4"></div>
      <div class="grid-item grid-item--b"></div>
      <div class="grid-item grid-item--a"></div>
      <div class="grid-item grid-item--c"></div>
      <div class="grid-item grid-item--a"></div>
      <div class="grid-item grid-item--a"></div>
      <div class="grid-item grid-item--b"></div>
      <div class="grid-item grid-item--c"></div>
      <div class="grid-item grid-item--c"></div>
    </div>
    
    <script>
    var colcade = new Colcade('.grid', {
      columns: '.grid-col',
      items: '.grid-item'
    });
    </script>
                                            </textarea>
                        </div>
                        <!-- Tabs Ends -->
                      </div>
                      <!-- demo-tabs container ends -->
                      <!-- New Docs Starts Here -->
                      <hr class="hr" id="media">
                      <h4 class="my-4">Media</h4>
                      <div class="demo-tabs">
                        <!-- Tabs Starts -->
                        <div data-pws-tab="LightBox" data-pws-tab-name="Lightbox">
                          <p>
                            <a href="http://sachinchoolur.github.io/lightGallery/">Light Galary</a> is a customizable, modular, responsive, Lightbox gallery plugin for jQuery.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use LightGallery in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/lightgallery/dist/css/lightgallery.min.css">
                                      </textarea>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="../../node_modules/lightgallery/dist/js/lightgallery-all.min.js"></script>
                                      </textarea>
                          <p> To create Lightbox Gallery, add the following code: </p>
                          <textarea class="multiple-codes">
    <div id="gallery" class="row lightGallery">
      <a class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="http://via.placeholder.com/690x580">
        <img src="http://via.placeholder.com/280x280" />
      </a>
      <a class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="http://via.placeholder.com/690x580">
        <img src="http://via.placeholder.com/280x280" />
      </a>
      <a class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="http://via.placeholder.com/690x580">
        <img src="http://via.placeholder.com/280x280" />
      </a>
      <a class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="http://via.placeholder.com/690x580">
        <img src="http://via.placeholder.com/280x280" />
      </a>
      <a class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="http://via.placeholder.com/690x580">
        <img src="http://via.placeholder.com/280x280" />
      </a>
    </div>
    
    <script>
    $("#lightgallery").lightGallery();
    </script>
                                    </textarea>
                        </div>
                        <!-- Tabs Ends -->
                        <!-- Tabs Starts -->
                        <div data-pws-tab="owl-carousel" data-pws-tab-name="Owl Carousel">
                          <p>
                            <a href="https://owlcarousel2.github.io/OwlCarousel2/">Owl Carousel</a> is a touch enabled jQuery plugin that lets you create a beautiful responsive carousel slider.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use Owl Carousel in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/owl-carousel-2/assets/owl.carousel.min.css" />
                                      </textarea>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/owl-carousel-2/owl.carousel.min.js"></script>
                                      </textarea>
                          <p> To create a carousel, add the following code: </p>
                          <textarea class="multiple-codes">
    <div class="owl-carousel owl-theme nonloop">
      <div class="item"><h4>1</h4></div>
      <div class="item"><h4>2</h4></div>
      <div class="item"><h4>3</h4></div>
      <div class="item"><h4>4</h4></div>
      <div class="item"><h4>5</h4></div>
      <div class="item"><h4>6</h4></div>
      <div class="item"><h4>7</h4></div>
      <div class="item"><h4>8</h4></div>
      <div class="item"><h4>9</h4></div>
      <div class="item"><h4>10</h4></div>
      <div class="item"><h4>11</h4></div>
      <div class="item"><h4>12</h4></div>
    </div>
    
    <script>
    $('.owl-carousel').owlCarousel();
    </script></textarea>
                        </div>
                        <!-- Tabs Ends -->
                      </div>
                      <!-- demo-tabs container ends -->
                      <!--Tables starts-->
                      <hr class="hr" id="tables">
                      <h4 class="my-4">Tables</h4>
                      <div class="demo-tabs">
                        <!-- Basic table starts -->
                        <div data-pws-tab="basic-table" data-pws-tab-name="Basic table">
                          <p> To create a basic Twitter Bootstrap table, add the following code. </p>
                          <textarea class="multiple-codes">
    <table class="table">
      <thead>
      <tr class="">
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Username</th>
      </tr>
      </thead>
      <tbody>
        <tr>
          <td scope="row">1</td>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <td scope="row">2</td>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
        <tr>
          <td scope="row">3</td>
          <td>Larry</td>
          <td>the Bird</td>
          <td>@twitter</td>
        </tr>
      </tbody>
    </table>
    </textarea>
                        </div>
                        <!-- Basic table Ends -->
                        <!-- bootstrap-table Starts -->
                        <div data-pws-tab="bootstrap-table" data-pws-tab-name="Bootstrap table">
                          <p>
                            <a href="http://bootstrap-table.wenzhixin.net.cn/">Bootstrap-table</a> is an extended Bootstrap table with radio, checkbox, sort, pagination, and other added features.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use Bootstrap-table in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/bootstrap-table/dist/bootstrap-table.min.css" /></textarea>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/bootstrap-table/dist/bootstrap-table.min.js"></script></textarea>
                          <p> Activate Bootstrap table without writing JavaScript, set data-toggle="table" on a normal table. </p>
                          <textarea class="multiple-codes">
    <table data-toggle="table">
      <thead>
      <tr>
        <th>Item ID</th>
        <th>Item Name</th>
        <th>Item Price</th>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td>1</td>
        <td>Item 1</td>
        <td>$1</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Item 2</td>
        <td>$2</td>
      </tr>
      </tbody>
    </table>
    </textarea>
                        </div>
                        <!-- Bootstrap-table Ends -->
                        <!-- Js-grid Starts -->
                        <div data-pws-tab="js-grid" data-pws-tab-name="Js-grid">
                          <p>
                            <a href="http://js-grid.com/">Js-grid</a> creates simple responsive chartsis a lightweight client-side data grid control based on jQuery.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use Js-grid in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/jsgrid/dist/jsgrid.min.css" />
    <link rel="stylesheet" href="path-to/node_modules/jsgrid/dist/jsgrid-theme.min.css" /></textarea>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/jsgrid/dist/jsgrid.min.js"></script></textarea>
                          <p> To create a basic table using Js-grid, add the following code: </p>
                          <textarea class="multiple-codes">
    <div id="js-grid"></div>
    <script>
    $("#js-grid").jsGrid({
      height: "500px",
      width: "100%",
      filtering: true,
      editing: true,
      inserting: true,
      sorting: true,
      paging: true,
      autoload: true,
      pageSize: 15,
      pageButtonCount: 5,
      deleteConfirm: "Do you really want to delete the client?",
      controller: db,
      fields: [{
        name: "Name",
        type: "text",
        width: 150
      },
      {
        name: "Age",
        type: "number",
        width: 50
      },
      {
        name: "Address",
        type: "text",
        width: 200
      },
      {
        name: "Country",
        type: "select",
        items: db.countries,
        valueField: "Id",
        textField: "Name"
      },
      {
        name: "Married",
        type: "checkbox",
        title: "Is Married",
        sorting: false
      },
      {
        type: "control"
      }]
    });
    </script></textarea>
                        </div>
                        <!-- Js-grid Ends -->
                        <!-- Table-sorter Starts -->
                        <div data-pws-tab="SortableTable" data-pws-tab-name="Sortable table">
                          <p>
                            <a href="http://tablesorter.com/docs/">Tablesorter</a> is a jQuery plugin for turning a standard HTML table with THEAD and TBODY tags into a sortable table without page refreshes.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use Table in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/bootstrap-table/dist/bootstrap-table.min.css">
                                        </textarea>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/js/jq.tablesort.js"></script>
                                        </textarea>
                          <p> To create a Table, add the following code: </p>
                          <textarea class="multiple-codes">

    <div class="table-sorter-wrapper">
      <table id="myTable" class="table table-striped table-hover">
        <thead>
          <tr>
            <th class="sortStyle">Last Name</th>
            <th class="sortStyle">First Name</th>
            <th class="sortStyle">Due</th>
            <th class="sortStyle">Web Site</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Smith</td>
            <td>John</td>
            <td>$50.00</td>
            <td>http://www.jsmith.com</td>
          </tr>
          <tr>
            <td>Bach</td>
            <td>Frank</td>
            <td>$50.00</td>
            <td>http://www.frank.com</td>
          </tr>
          <tr>
            <td>Doe</td>
            <td>Jason</td>
            <td>$100.00</td>
            <td>http://www.jdoe.com</td>
          </tr>
          <tr>
            <td>Conway</td>
            <td>Tim</td>
            <td>$50.00</td>
            <td>http://www.timconway.com</td>
          </tr>
        </tbody>
      </table>
    </div>
    
    <script>
    $('#myTable').tablesort();
    </script>
    
                                        </textarea>
                        </div>
                        <!-- Table-sorter Ends -->
                      </div>
                      <!--Tables ends-->
                      <!-- New Docs Starts Here -->
                      <!-- New Docs Ends Here -->
                      <hr class="hr" id="charts">
                      <h4 class="my-4">Charts</h4>
                      <div class="demo-tabs">
                        <div data-pws-tab="anynameyouwant1" data-pws-tab-name="Chart.js">
                          <p>
                            <a href="http://www.chartjs.org/">Chart.js</a> is a simple yet flexible JavaScript charting for designers & developers.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use Chart.js in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" /></textarea>
                          <p> and the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/chart.js/dist/Chart.min.js"></script></textarea>
                          <p> To create a simple chart, add the following code: </p>
                          <textarea class="multiple-codes">
    <canvas id="lineChart" style="height:250px"></canvas>
    
    <script>
      var data = {
          labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
          datasets: [{
              label: '# of Votes',
              data: [12, 19, 3, 5, 2, 3],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255,99,132,1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      };
      var options = {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          },
          legend: {
              display: false
          },
          elements: {
            point: {
                radius: 0
            }
          }
    
      };
      if($("#lineChart").length) {
        var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas, {
          type: 'line',
          data: data,
          options: options
        });
      }
    </script></textarea>
                        </div>
                        <div data-pws-tab="Float-Chart" data-pws-tab-name="Float.js">
                          <p>
                            <a href="http://www.flotcharts.org/">Float.js</a> is a pure JavaScript plotting library for jQuery, with a focus on simple usage, attractive looks and interactive features.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> Add following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/flot/jquery.flot.js"></script>
    <script src="path-to/node_modules/flot/jquery.flot.resize.js"></script></textarea>
                          <p> To create a simple chart, add the following code: </p>
                          <textarea class="multiple-codes">
    <div class="float-chart-container">
      <div id="placeholder-basic" class="float-chart"></div>
    </div>
    
    <script>
    $(function() {
      var d1 = [];
      for (var i = 0; i < Math.PI * 2; i += 0.25) {
        d1.push([i, Math.sin(i)]);
      }
      var d2 = [];
      for (var i = 0; i < Math.PI * 2; i += 0.25) {
        d2.push([i, Math.cos(i)]);
      }
      var d3 = [];
      for (var i = 0; i < Math.PI * 2; i += 0.1) {
        d3.push([i, Math.tan(i)]);
      }
      $.plot("#placeholder-basic-option", [{
          label: "sin(x)",
          data: d1
        },
        {
          label: "cos(x)",
          data: d2
        },
        {
          label: "tan(x)",
          data: d3
        }
      ], {
        series: {
          lines: {
            show: true
          },
          points: {
            show: true
          }
        },
        xaxis: {
          ticks: [
            0, [Math.PI / 2, "\u03c0/2"],
            [Math.PI, "\u03c0"],
            [Math.PI * 3 / 2, "3\u03c0/2"],
            [Math.PI * 2, "2\u03c0"]
          ]
        },
        yaxis: {
          ticks: 10,
          min: -2,
          max: 2,
          tickDecimals: 3
        },
        grid: {
          backgroundColor: {
            colors: ["#fff", "#eee"]
          },
          borderWidth: {
            top: 1,
            right: 1,
            bottom: 2,
            left: 2
          }
        }
      });
    });
    </script></textarea>
                        </div>
                        <div data-pws-tab="google-chart" data-pws-tab-name="Google">
                          <p>
                            <a href="https://developers.google.com/chart/">Google</a> chart tools are powerful, simple to use, and free. Try out our rich gallery of interactive charts and data tools.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script></textarea>
                          <p> Basic chart structure: </p>
                          <textarea class="multiple-codes">
    <div class="google-chart-container">
      <div id="Bar-chart" class="google-charts"></div>
    </div>
    
    <script>
    if($("#barChart").length) {
      var barChartCanvas = $("#barChart").get(0).getContext("2d");
      // This will get the first returned node in the jQuery collection.
      var barChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: data,
        options: options
      });
    }
    </script></textarea>
                        </div>
                        <!-- Tabs Starts -->
                        <div data-pws-tab="c3" data-pws-tab-name="C3.js">
                          <p>
                            <a href="http://c3js.org/">C3.js</a> is a D3-based reusable chart library.
                          </p>
                          <h6>Usage</h6>
                          <p> To use C3 charts in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/c3/c3.min.css" /></textarea>
                          <p> and the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/d3/d3.min.js"></script>
    <script src="path-to/node_modules/c3/c3.min.js"></script></textarea>
                          <p> To create a simple chart, add the following code: </p>
                          <textarea class="multiple-codes">
    <div id="c3-line-chart"></div>
    
    <script>
      var c3LineChart = c3.generate({
        bindto: '#c3-line-chart',
        data: {
          columns: [
              ['data1', 30, 200, 100, 400, 150, 250],
              ['data2', 50, 20, 10, 40, 15, 25]
          ]
        }
      });
    </script></textarea>
                        </div>
                        <!-- Tabs Ends -->
                        <!-- Chartist Starts -->
                        <div data-pws-tab="chartist" data-pws-tab-name="Chartist">
                          <p>
                            <a href="https://gionkunz.github.io/chartist-js/">Chartist</a> creates simple responsive charts.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use Chartist in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/chartist/dist/chartist.min.css" /></textarea>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/chartist/dist/chartist.min.js"></script></textarea>
                          <p> To create a simple line chart using Chartist, add the following code: </p>
                          <textarea class="multiple-codes">
    <div class="ct-chart ct-perfect-fourth" id="ct-chart-line"></div>
    
    <script>
    new Chartist.Line('#ct-chart-line', {
        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
        series: [
            [12, 9, 7, 8, 5],
            [2, 1, 3.5, 7, 3],
            [1, 3, 4, 5, 6]
        ]
    }, {
        fullWidth: true,
        chartPadding: {
            right: 40
        }
    });
    </script></textarea>
                        </div>
                        <!-- Chartist Ends -->
                        <!-- Morris Starts -->
                        <div data-pws-tab="morris" data-pws-tab-name="Morris">
                          <p>
                            <a href="http://morrisjs.github.io/morris.js/">Morris</a> creates pretty time-series line graphs.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use Morris in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/morris.js/morris.css" /></textarea>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/raphael/raphael.min.js"></script>
    <script src="path-to/node_modules/morris.js/morris.min.js"></script></textarea>
                          <p> To create a simple line chart using Morris, add the following code: </p>
                          <textarea class="multiple-codes">
    <div id="morris-line-example"></div>
    
    <script>
    Morris.Line({
        element: 'morris-line-example',
        data: [{
                y: '2006',
                a: 100,
                b: 90
            },
            {
                y: '2007',
                a: 75,
                b: 65
            },
            {
                y: '2008',
                a: 50,
                b: 40
            },
            {
                y: '2009',
                a: 75,
                b: 65
            },
            {
                y: '2010',
                a: 50,
                b: 40
            },
            {
                y: '2011',
                a: 75,
                b: 65
            },
            {
                y: '2012',
                a: 100,
                b: 90
            }
        ],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B']
    });
    </script></textarea>
                        </div>
                        <!-- Morris Ends -->
                        <!-- Sparkline Starts -->
                        <div data-pws-tab="sparkline" data-pws-tab-name="Sparkline">
                          <p>
                            <a href="https://omnipotent.net/jquery.sparkline/#s-about">Jquery Sparkline</a> generates sparklines (small inline charts) directly in the browser using data supplied either inline in the HTML, or via Javascript.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use Sparkline in your application, add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script></textarea>
                          <p> To create a line chart using Sparkline, add the following code: </p>
                          <textarea class="multiple-codes">
    <div id="sparkline-line-chart"></div>
    
    <script>
    $("#sparkline-line-chart").sparkline([5,6,7,9,9,5,3,2,2,4,6,7], {
      type: 'line',
      width: '100%',
      height: '100%'
    });
    </script></textarea>
                        </div>
                        <!-- Sparkline Ends -->
                        <!-- Tabs Starts -->
                        <div data-pws-tab="JustGage" data-pws-tab-name="Just Gage">
                          <p>
                            <a href="http://justgage.com/">Just Gage</a> is a handy JavaScript plugin for generating and animating nice & clean gauges.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
      <script src="path-to/node_modules/justgage/justgage.js"></script>
                                        </textarea>
                          <p> To create a gage, add the following code: </p>
                          <textarea class="multiple-codes">
      <div id="justgage" class="gauge"></div>
    
      <script>
      window.onload = function() {
        var g1 = new JustGage({
          id: "g1",
          value: getRandomInt(0, 100),
          min: 0,
          max: 100,
          title: "Big Fella",
          label: "pounds"
        });
      };
      </script>
                                        </textarea>
                        </div>
                        <!-- Tabs Ends -->
                      </div>
                      <!-- New Docs Starts Here -->
                      <hr class="hr" id="maps">
                      <h4 class="my-4">Maps</h4>
                      <div class="demo-tabs">
                        <div data-pws-tab="Vector-map" data-pws-tab-name="Vector Map">
                          <p>
                            <a href="http://jvectormap.com/">JvectorMap</a> uses only native browser technologies like JavaScript, CSS, HTML, SVG or VML.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use Vector map in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/jqvmap/dist/jqvmap.min.css" /></textarea>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/jqvmap/dist/jquery.vmap.min.js"></script></textarea>
                          <p> To create a simple map, add the following code: </p>
                          <textarea class="multiple-codes">
    <div id="vmap" class="vector-map" style="width: 100%; height:500px"></div>
    
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }
    
      $(function() {
        jQuery('#vmap').vectorMap({ map: 'world_en' });
      });
    </script></textarea>
                        </div>
                        <!-- Tabs Ends -->
                        <!-- Tabs Starts -->
                        <div data-pws-tab="Mapeal" data-pws-tab-name="Mapeal">
                          <p>
                            <a href="https://www.vincentbroute.fr/mapael/">Mapeal Map</a> Ease the build of pretty data visualizations on dynamic vector maps.
                          </p>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/raphael/raphael.min.js"></script>
    <script src="path-to/node_modules/jquery-mapael/js/jquery.mapael.min.js"></script></textarea>
                          <p> To create a simple map, add the following code: </p>
                          <textarea class="multiple-codes">
    <div class="container">
        <div class="map">Alternative content</div>
    </div>
    
    <script>
      $(".container").mapael({
        map: {
          name: "world_countries"
        }
      });
    </script></textarea>
                        </div>
                        <!-- Tabs Ends -->
                      </div>
                      <!-- demo-tabs container ends -->
                      <!-- New Docs Ends Here -->
                      <!--Forms starts-->
                      <hr class="hr" id="forms">
                      <h4 class="my-4">Forms</h4>
                      <div class="demo-tabs">
                        <!-- Basic elements Starts -->
                        <div data-pws-tab="basic-elements" data-pws-tab-name="Basic elements">
                          <p> The basic form elements can be added to your application as below: </p>
                          <textarea class="multiple-codes">
    <form class="forms-sample">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control p-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted text-success"><span class="fa fa-info mt-1"></span>&nbsp; We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control p-input" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="exampleTextarea">Example textarea</label>
            <textarea class="form-control p-input" id="exampleTextarea" rows="3">&lt;/textarea&gt;
        </div>
        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
        </div>
        <fieldset class="form-group">
            <legend class="mb-4 mt-5">Radio buttons</legend>
            <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                  Option one is this and that&mdash;be sure to include why it's great
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
                  Option two can be something else and selecting it will deselect option one
                </label>
            </div>
            <div class="form-check disabled">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="option3" disabled>
                  Option three is disabled
                </label>
            </div>
        </fieldset>
        <div class="form-check col-12">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input">
              Check me out
            </label>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form></textarea>
                        </div>
                        <!-- Basic elements Ends -->
                        <!-- Form validation Starts -->
                        <div data-pws-tab="validation" data-pws-tab-name="Validation">
                          <p> We are using <a href="https://jqueryvalidation.org/">Jquery validation</a> for simple clientside form validation. </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use jquery validation in your application, include the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/jquery-validation/dist/jquery.validate.min.js"></script></textarea>
                          <p> The following code shows validation of a simple form: </p>
                          <textarea class="multiple-codes">
    <form class="cmxform" id="commentForm" method="get" action="">
      <fieldset>
        <div class="form-group">
          <label for="cname">Name (required, at least 2 characters)</label>
          <input id="cname" class="form-control" name="name" minlength="2" type="text" required>
        </div>
        <div class="form-group">
          <label for="cemail">E-Mail (required)</label>
          <input id="cemail" class="form-control" type="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="curl">URL (optional)</label>
          <input id="curl" class="form-control" type="url" name="url">
        </div>
        <div class="form-group">
          <label for="ccomment">Your comment (required)</label>
          <textarea id="ccomment" class="form-control" name="comment" required>&lt;/textarea&gt;
        </div>
        <input class="btn btn-primary" type="submit" value="Submit">
      </fieldset>
    </form>
    
    <script>
      $.validator.setDefaults({
          submitHandler: function() {
              alert("submitted!");
          }
      });
      $(function() {
          // validate the comment form when it is submitted
          $("#commentForm").validate({
            errorPlacement: function(label, element) {
              label.addClass('text-danger');
              label.insertAfter(element);
            },
            highlight: function(element, errorClass) {
              $(element).parent().addClass('has-danger')
              $(element).addClass('form-control-danger')
            }
          });
      });
    </script></textarea>
                        </div>
                        <!-- Form validation Ends -->
                        <!-- Wizard Starts -->
                        <div data-pws-tab="Wizard" data-pws-tab-name="Wizard">
                          <p> We are using <a href="http://www.jquery-steps.com/">Jquery steps</a> in our template to create form addons. It is an all-in-one wizard plugin that is extremely flexible, compact and feature-rich. </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use jquery.steps in your application, include the following files &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/jquery-steps/build/jquery.steps.min.js"></script></textarea>
                          <p> The following code generates a simple form wizard. </p>
                          <textarea class="multiple-codes">
    <form id="example-form" action="#">
      <div>
        <h3>Account</h3>
        <section>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm password">
          </div>
        </section>
        <h3>Profile</h3>
        <section>
          <div class="form-group">
            <label for="exampleInputEmail1">First name</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter first name">
          </div>
          <div class="form-group">
            <label>Last name</label>
            <input type="password" class="form-control" placeholder="Last name">
          </div>
          <div class="form-group">
            <label>Profession</label>
            <input type="password" class="form-control" placeholder="Profession">
          </div>
        </section>
        <h3>Comments</h3>
        <section>
          <div class="form-group">
            <label>Comments</label>
            <textarea class="form-control" rows="3">&lt;/textarea&gt;
          </div>
        </section>
        <h3>Finish</h3>
        <section>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input">
              I agree terms and conditions
            </label>
          </div>
        </section>
      </div>
    </form>
    
    <script>
      var form = $("#example-form");
      form.children("div").steps({
          headerTag: "h3",
          bodyTag: "section",
          transitionEffect: "slideLeft",
          onFinished: function (event, currentIndex) {
              alert("Submitted!");
          }
      });
    </script></textarea>
                        </div>
                        <!-- Wizard Ends -->
                        <!-- Repeater Starts -->
                        <div data-pws-tab="FormRepeater" data-pws-tab-name="Form Repeater">
                          <p>
                            <a href="http://briandetering.net/repeater">Jquery Repeater</a> is an interface to add and remove a repeatable group of input elements.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/jquery.repeater/jquery.repeater.min.js"></script></textarea>
                          <p> To create a Repeater, add the following code: </p>
                          <textarea class="multiple-codes">
    <form class="form-inline repeater">
      <div data-repeater-list="group-a">
          <div data-repeater-item class="d-flex mb-2">
              <label class="sr-only" for="inlineFormInput">Name</label>
              <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Jane Doe">
              <label class="sr-only" for="inlineFormInputGroup">Username</label>
              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                  </div>
                  <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
              <input data-repeater-delete type="button" class="btn btn-danger ms-2" value="Delete" />
          </div>
      </div>
      <input data-repeater-create type="button" class="btn btn-success ms-2 mb-2" value="+" />
    </form>
    
    <script>
      $(document).ready(function() {
        $('.repeater').repeater()
      });
    </script></textarea>
                        </div>
                        <!-- Repeater Ends -->
                      </div>
                      <!--Forms ends-->
                      <!--Additional form elements starts-->
                      <hr class="hr" id="additional-form">
                      <h4 class="my-4">Additional form elements</h4>
                      <div class="demo-tabs">
                        <!-- Tags Starts -->
                        <div data-pws-tab="tags" data-pws-tab-name="Tags">
                          <p>
                            <a href="http://xoxco.com/projects/code/tagsinput/">jQuery-Tags-Input</a> magically convert a simple text input into a cool tag list with this jQuery plugin.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use jQuery-Tags-Input in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/jquery-tags-input/dist/jquery.tagsinput.min.css" /></textarea>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/jquery-tags-input/dist/jquery.tagsinput.min.js"></script></textarea>
                          <p> To convert an input to tag using jQuery-Tags-Input, add the following code: </p>
                          <textarea class="multiple-codes">
    <input name="tags" id="tags" value="London,Canada,Australia,Mexico" />
    
    <script>
      $('#tags').tagsInput({
          'width': '100%',
          'height': '75%',
          'interactive': true,
          'defaultText': 'Add More',
          'removeWithBackspace': true,
          'minChars': 0,
          'maxChars': 20, // if not provided there is no limit
          'placeholderColor': '#666666'
      });
    </script></textarea>
                        </div>
                        <!-- Tags Ends -->
                        <!-- Rating Starts -->
                        <div data-pws-tab="BarRating" data-pws-tab-name="Rating">
                          <p>
                            <a href="http://antenna.io/demo/jquery-bar-rating/examples/">jQuery Bar Rating</a> Plugin works by transforming a standard select field into a rating widget.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use Purple rating in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="path-to/node_modules/jquery-bar-rating/dist/themes/fontawesome-stars.css"></textarea>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/jquery-bar-rating/dist/jquery.barrating.min.js"></script></textarea>
                          <p> To create a simple rating, add the following code: </p>
                          <textarea class="multiple-codes">
    <select id="example-fontawesome" name="rating" autocomplete="off">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
    
    <script>
      $('#example-fontawesome').barrating({
        theme: 'fontawesome-stars',
        showSelectedRating: false
      });
    </script></textarea>
                        </div>
                        <!-- Rating Ends -->
                        <!-- Tabs Starts -->
                        <div data-pws-tab="BTMaxLength" data-pws-tab-name="Bootstrap Max-Length">
                          <p>
                            <a href="http://mimo84.github.io/bootstrap-maxlength/">Bootstrap MaxLength</a> uses a Twitter Bootstrap label to show a visual feedback to the user about the maximum length of the field where the user is inserting text. Uses the HTML5 attribute "maxlength" to work.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/bootstrap-maxlength/bootstrap-maxlength.min.js"></script></textarea>
                          <p> To create a Maxlength input, add the following code: </p>
                          <textarea class="multiple-codes">
    <input class="form-control" maxlength="25" name="defaultconfig" id="defaultconfig" type="text">
    
    <script>
      $('#defaultconfig').maxlength();
    </script></textarea>
                        </div>
                        <!-- Tabs Ends -->
                        <!-- Form mask Starts -->
                        <div data-pws-tab="form-mask" data-pws-tab-name="Input Mask">
                          <p>
                            <a href="http://robinherbots.github.io/Inputmask/">Input-mask</a> helps the user with the input by ensuring a predefined format. This can be useful for dates, numerics, phone numbers etc.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use Inputmask in your application, include the following files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/inputmask/dist/jquery.inputmask.bundle.js"></script>
    <script src="path-to/node_modules/inputmask/dist/inputmask/phone-codes/phone.js"></script>
    <script src="path-to/node_modules/inputmask/dist/inputmask/phone-codes/phone-be.js"></script>
    <script src="path-to/node_modules/inputmask/dist/inputmask/phone-codes/phone-ru.js"></script>
    <script src="path-to/node_modules/inputmask/dist/inputmask/bindings/inputmask.binding.js"></script></textarea>
                          <p> The below code shows an example of input mask for date. </p>
                          <textarea class="multiple-codes">
    <input class="form-control" data-inputmask="'alias': 'date'" /></textarea>
                        </div>
                        <!-- Form mask Ends -->
                        <!-- Typeahead Starts -->
                        <div data-pws-tab="typeahead" data-pws-tab-name="Typeahead">
                          <p>
                            <a href="https://twitter.github.io/typeahead.js/">Typeahead.js</a> is a flexible JavaScript library that provides a strong foundation for building robust typeaheads.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use Typeahead.js in your application, include the following files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/typeahead.js/dist/typeahead.bundle.min.js"></script></textarea>
                          <p> A sample typeahead can be generated as below: </p>
                          <textarea class="multiple-codes">
    <div id="typeahead sample">
        <input class="typeahead" type="text" placeholder="States of USA">
    </div>
    
    <script>
      //Define substring matcher function
      var substringMatcher = function (strs) {
          return function findMatches(q, cb) {
              var matches, substringRegex;
    
              // an array that will be populated with substring matches
              matches = [];
    
              // regex used to determine if a string contains the substring `q`
              substrRegex = new RegExp(q, 'i');
    
              // iterate through the pool of strings and for any string that
              // contains the substring `q`, add it to the `matches` array
              $.each(strs, function (i, str) {
                  if (substrRegex.test(str)) {
                      matches.push(str);
                  }
              });
    
              cb(matches);
          };
      };
    
      //dataset
      var states = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
          'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
          'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
          'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
          'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
          'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
          'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
          'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
          'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
      ];
    
      //Initialisation
      $('#typeahead-sample .typeahead').typeahead({
          hint: true,
          highlight: true,
          minLength: 1
      }, {
          name: 'states',
          source: substringMatcher(states)
      });
    </script></textarea>
                        </div>
                        <!-- Typeahead Ends -->
                      </div>
                      <!--Additional form elements ends-->
                      <!--Icons starts-->
                      <hr class="hr" id="icons">
                      <h4 class="my-4">Icons</h4>
                      <div class="demo-tabs">
                        <!-- MDI icon Starts -->
                        <div data-pws-tab="mdi-icon" data-pws-tab-name="Material Icons">
                          <p>
                            <a href="https://materialdesignicons.com/">Material Design Icons</a> growing icon collection allows designers and developers targeting various platforms to download icons in the format, color and size they need for any project.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use Material Design Icons in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/mdi/css/materialdesignicons.min.css"/></textarea>
                          <p> To generate an icon, add the following code: </p>
                          <textarea class="multiple-codes">
    <i class="mdi mdi-bell"></i>
                                                </textarea>
                        </div>
                        <!-- MDI icon Ends -->
                        <!-- Font awesome starts -->
                        <div data-pws-tab="font-awesome" data-pws-tab-name="Font Awesome">
                          <p>
                            <a href="http://fontawesome.io/">Font Awesome</a> gives you scalable vector icons that can instantly be customized.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use Font Awesome in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/font-awesome/css/font-awesome.min.css" /></textarea>
                          <p> To create an address-book icon, add the following code: </p>
                          <textarea class="multiple-codes">
    <i class="fa fa-address-book"></textarea>
                        </div>
                        <!-- Font awesome Ends -->
                        <!-- Themify Starts -->
                        <div data-pws-tab="themify" data-pws-tab-name="Themify Icons">
                          <p>
                            <a href="https://themify.me/themify-icons">Themify Icons</a> Themify Icons is a complete set of icons for use in web design and apps.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use themify icons in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/ti-icons/css/themify-icons.css" /></textarea>
                          <p> To generate an icon, add the following code: </p>
                          <textarea class="multiple-codes">
    <i class="ti-arrow-up"></i></textarea>
                        </div>
                        <!-- Themify Ends -->
                        <!-- Simple line icon Starts -->
                        <div data-pws-tab="simple-line-icon" data-pws-tab-name="Simple Line Icons">
                          <p>
                            <a href="http://simplelineicons.com/">Simple Line Icons</a> is a set of simple and minimal line icons.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use Simple Line Icons in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/simple-line-icons/css/simple-line-icons.css" /></textarea>
                          <p> To generate an icon, add the following code: </p>
                          <textarea class="multiple-codes">
    <i class="icon-user"></i></textarea>
                        </div>
                        <!-- Simple line icon Ends -->
                        <!-- Flag icon Starts -->
                        <div data-pws-tab="flag-icon" data-pws-tab-name="Flag Icons">
                          <p>
                            <a href="http://flag-icon-css.lip.is/">Flag Icons</a> is a collection of all country flags in SVG — plus the CSS for easier integration.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use Simple Line Icons in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/flag-icon-css/css/flag-icons.min.css"/></textarea>
                          <p> To generate an icon, add the following code: </p>
                          <textarea class="multiple-codes">
    <i class="flag-icon flag-icon-ad" title="ad" id="ad"></i></textarea>
                        </div>
                        <!-- Simple line icon Ends -->
                      </div>
                      <!--icons ends-->
                      <hr class="hr" id="file-upload">
                      <h4 class="my-4">File Upload</h4>
                      <div class="demo-tabs">
                        <!-- Tabs Starts -->
                        <div data-pws-tab="Dropify" data-pws-tab-name="Dropify">
                          <p>
                            <a href="http://jeremyfagis.github.io/dropify/">Dropify</a> is a simple drag n drop file upload.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use Dropify in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/dropify/dist/css/dropify.min.css">
                                                </textarea>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/dropify/dist/js/dropify.min.js"></script>
                                                </textarea>
                          <p> To create a Dropify file upload, add the following code: </p>
                          <textarea class="multiple-codes">
      <input type="file" class="dropify"/>
    
      <script>
        $('.dropify').dropify();
      </script></textarea>
                        </div>
                        <!-- Tabs Ends -->
                        <!-- Tabs Starts -->
                        <div data-pws-tab="Dropzone" data-pws-tab-name="Dropzone">
                          <p>
                            <a href="http://www.dropzonejs.com/">Dropzone</a> is an open source library that provides drag’n’drop file uploads with image previews.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/dropzone/dist/dropzone.js"></script></textarea>
                          <p> To create a Dropzone file upload,add the following code: </p>
                          <textarea class="multiple-codes">
    <form action="/file-upload" class="dropzone" id="my-awesome-dropzone"></form>
    
    <script>
      $("#my-awesome-dropzone").dropzone({ url: "/file/post" });
    </script></textarea>
                        </div>
                        <!-- Tabs Ends -->
                        <!-- Tabs Starts -->
                        <div data-pws-tab="jquery-file-upload" data-pws-tab-name="Jquery file upload">
                          <p>
                            <a href="http://hayageek.com/docs/jquery-upload-file.php">jQuery File UPload</a> plugin provides multiple file uploads with progress bar. jQuery File Upload Plugin depends on Ajax Form Plugin, So Github contains source code with and without form plugin.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use file upload in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/jquery-file-upload/css/uploadfile.css"></textarea>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/jquery-file-upload/js/jquery.uploadfile.min.js"></script></textarea>
                          <p> To create a Jquery file upload,add the following code: </p>
                          <textarea class="multiple-codes">
    <div class="file-upload-wrapper">
      <div id="fileuploader">Upload</div>
    </div>
    
    <script>
      $("#fileuploader").uploadFile({
        url: "YOUR_FILE_UPLOAD_URL",
        fileName: "myfile"
      });
    </script></textarea>
                        </div>
                        <!-- Tabs Ends -->
                      </div>
                      <!-- demo-tabs container ends -->
                      <!-- New Docs Ends Here -->
                      <!-- New Docs Starts Here -->
                      <hr class="hr" id="form-picker">
                      <h4 class="my-4">Form Picker</h4>
                      <div class="demo-tabs">
                        <!-- Tabs Starts -->
                        <div data-pws-tab="clock-picker" data-pws-tab-name="Clock Picker">
                          <p> We are using <a href="https://tempusdominus.github.io/bootstrap-4/">Tempus Dominus plugin</a> in our template to create beautiful time picker. </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use clock picker in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css" /></textarea>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.js"></script></textarea>
                          <p> To create a clock picker, add the following code: </p>
                          <textarea class="multiple-codes">
    <div class="input-group date" id="timepicker-example" data-target-input="nearest">
      <div class="input-group" data-target="#timepicker-example" data-toggle="datetimepicker">
        <input type="text" class="form-control datetimepicker-input" data-target="#timepicker-example"/>
        <div class="input-group-addon input-group-append"><i class="mdi mdi-clock input-group-text"></i></div>
      </div>
    </div>
    
    <script>
      $('#timepicker-example').datetimepicker({
        format: 'LT'
      });
    </script></textarea>
                        </div>
                        <!-- Tabs Ends -->
                        <!-- Tabs Starts -->
                        <div data-pws-tab="date-picker" data-pws-tab-name="Date Picker">
                          <p>
                            <a href="https://bootstrap-datepicker.readthedocs.io/en/latest/">Bootstrap Date Picker</a> provides a flexible datepicker widget in the Bootstrap style.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use bootstrap date picker in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" /></textarea>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script></textarea>
                          <p> To create a datepicker, add the following code: </p>
                          <textarea class="multiple-codes">
    <div id="datepicker-popup" class="input-group date datepicker">
      <input type="text" class="form-control">
      <span class="input-group-addon input-group-append border-left">
        <span class="mdi mdi-calendar input-group-text"></span>
      </span>
    </div>
    
    <script>
      $('#datepicker-popup').datepicker();
    </script></textarea>
                        </div>
                        <!-- Tabs Ends -->
                        <!-- Tabs Starts -->
                        <div data-pws-tab="color-picker" data-pws-tab-name="Color Picker">
                          <p>
                            <a href="http://www.oss.io/p/amazingSurge/jquery-asColorPicker">AsColor Picker</a> is a jQuery plugin that convent input into color picker.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use color picker in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/jquery-asColorPicker/dist/css/asColorPicker.min.css" />
                                                </textarea>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="path-to/node_modules/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
    <script src="path-to/node_modules/jquery-asGradient/dist/jquery-asGradient.min.js"></script> //optional
                                                </textarea>
                          <p> To create a color picker, add the following code: </p>
                          <textarea class="multiple-codes">
    <input type='text' class="color-picker" value="#ffe74c" />
    
    <script>
      $('.color-picker').asColorPicker()
    </script></textarea>
                        </div>
                        <!-- Tabs Ends -->
                      </div>
                      <!-- demo-tabs container ends -->
                      <!-- New Docs Ends Here -->
                      <!--Form editors starts-->
                      <hr class="hr" id="editors">
                      <h4 class="my-4">Editors</h4>
                      <div class="demo-tabs">
                        <!-- Tinymce Starts -->
                        <div data-pws-tab="tinymce" data-pws-tab-name="Tinymce">
                          <p>
                            <a href="https://www.tinymce.com/">Tinymce</a> is a full-featured web editing tool.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use Tinymce in your application, include the following files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/tinymce/tinymce.min.js"></script></textarea>
                          <p> To create an editor using tinymce, add the following code: </p>
                          <textarea class="multiple-codes">
    <textarea id='tinyMceExample'>&lt;/textarea&gt;
    
    <script>
      tinymce.init({
          selector: '#tinyMceExample',
          height: 500,
          theme: 'modern',
          plugins: [
              'advlist autolink lists link image charmap print preview hr anchor pagebreak',
              'searchreplace wordcount visualblocks visualchars code fullscreen',
              'insertdatetime media nonbreaking save table contextmenu directionality',
              'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
          ],
          toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
          toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
          image_advtab: true,
          templates: [{
                  title: 'Test template 1',
                  content: 'Test 1'
              },
              {
                  title: 'Test template 2',
                  content: 'Test 2'
              }
          ],
          content_css: [
              '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
              '//www.tinymce.com/css/codepen.min.css'
          ]
      });
    </script></textarea>
                        </div>
                        <!-- Tinymce Ends -->
                        <!-- X-editable Starts -->
                        <div data-pws-tab="x-editable" data-pws-tab-name="X-editable">
                          <p>
                            <a href="https://vitalets.github.io/x-editable/">X-editable</a> allows you to create editable elements on your page. It can be used with any engine (Bootstrap, jQuery-UI, jQuery only) and includes both popup and inline modes.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use x-editable in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css" /></textarea>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.js"></script></textarea>
                          <p> To create a simple editable text field, add the following code: </p>
                          <textarea class="multiple-codes">
    <a href="#" id="username" data-type="text" data-pk="1">awesome</a>
    
    <script>
      $.fn.editable.defaults.mode = 'inline';
      $.fn.editableform.buttons =
          '<button type="submit" class="btn btn-primary btn-sm editable-submit">' +
          '<i class="fa fa-fw fa-check"></i>' +
          '</button>' +
          '<button type="button" class="btn btn-default btn-sm editable-cancel">' +
          '<i class="fa fa-fw fa-times"></i>' +
          '</button>';
      $('#username').editable({
          type: 'text',
          pk: 1,
          name: 'username',
          title: 'Enter username'
      });
    </script></textarea>
                        </div>
                        <!-- X-editable Ends -->
                        <!-- Summernote Starts -->
                        <div data-pws-tab="summernote" data-pws-tab-name="Summernote">
                          <p>
                            <a href="http://summernote.org/">Summernote</a> is a super simple WYSIWYG Editor.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use summernote in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/summernote-bootstrap4/dist/summernote.css" /></textarea>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/summernote-bootstrap4/dist/summernote.min.js"></script></textarea>
                          <p> To create a summernote editor, add the following code: </p>
                          <textarea class="multiple-codes">
    <div id="summernoteExample"></div>
    
    <script>
      $('#summernoteExample').summernote({
          height: 300,
          tabsize: 2
      });
    </script></textarea>
                        </div>
                        <!-- Summernote Ends -->
                        <!-- SimpleMde Starts -->
                        <div data-pws-tab="simplemde" data-pws-tab-name="SimpleMDE">
                          <p>
                            <a href="https://simplemde.com/">SimpleMDE</a> is a simple, beautiful, and embeddable JavaScript Markdown editor.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use simpleMDE in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/simplemde/dist/simplemde.min.css" /></textarea>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/simplemde/dist/simplemde.min.js"></script></textarea>
                          <p> To create an editor using simpleMDE, add the following code: </p>
                          <textarea class="multiple-codes">
    <textarea id="simpleMde">Start editing here&lt;/textarea&gt;
    
    <script>
      if($("#simpleMde").length) {
        var simplemde = new SimpleMDE({ element: $("#simpleMde")[0] });
      }
    </script></textarea>
                        </div>
                        <!-- SimpleMDE Ends -->
                        <!-- Quill Starts -->
                        <div data-pws-tab="quill" data-pws-tab-name="Quill">
                          <p>
                            <a href="https://quilljs.com/">Quill</a> is a free, open source WYSIWYG editor built for the modern web.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use Quill in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/quill/dist/quill.snow.css" /></textarea>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/quill/dist/quill.min.js"></script></textarea>
                          <p> To create an editor using Quill, add the following code: </p>
                          <textarea class="multiple-codes">
    <div id="quillExample" class="quill-container"></div>
    
    <script>
      var quill = new Quill('#quillExample', {
          modules: {
              toolbar: [
                  [{
                      header: [1, 2, false]
                  }],
                  ['bold', 'italic', 'underline'],
                  ['image', 'code-block']
              ]
          },
          placeholder: 'Compose an epic...',
          theme: 'snow' // or 'bubble'
      });
    </script></textarea>
                        </div>
                        <!-- Quill Ends -->
                        <!-- Ace Starts -->
                        <div data-pws-tab="ace" data-pws-tab-name="Ace">
                          <p>
                            <a href="https://ace.c9.io/">Ace</a> is an embeddable code editor written in JavaScript. It matches the features and performance of native editors such as Sublime, Vim and TextMate.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use ace editor in your application, include the following files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/ace-builds/src/ace.js"></script>
    <script src="path-to/node_modules/ace-builds/src-min/mode-javascript.js"></script>
    <script src="path-to/node_modules/ace-builds/src-min/theme-chaos.js"></script><!--Choose any theme you wish--></textarea>
                          <p> To create a code editor using ace with a sample code, add the following code: </p>
                          <textarea class="multiple-codes">
    <div id="aceExample" class="ace-editor">
        var x = add(4, 3); // Function is called, return value will end up in x function add(a, b) { return a + b; // Function returns the sum of a and b } var y = mul(4, 3); // Function is called, return value will end up in y function add(a, b) { return a *
        b; // Function returns the product of a and b }
    </div>
    
    <script>
      var editor = ace.edit("aceExample");
      editor.setTheme("ace/theme/chaos"); //set theme
      editor.getSession().setMode("ace/mode/javascript"); //set mode
      document.getElementById('aceExample').style.fontSize='1rem'; //styling
    </script></textarea>
                        </div>
                        <!-- Ace Ends -->
                        <!-- Codemirror Starts -->
                        <div data-pws-tab="codemirror" data-pws-tab-name="CodeMirror">
                          <p>
                            <a href="https://codemirror.net/">CodeMirror</a> is a versatile text editor implemented in JavaScript for the browser. It is specialized for editing code, and comes with a number of language modes and addons that implement more advanced editing functionality.
                          </p>
                          <h5 class="mt-5 mb-4">Usage</h5>
                          <p> To use CodeMirror in your application, include the following files in &lt;head&gt;. </p>
                          <textarea class="multiple-codes">
    <link rel="stylesheet" href="path-to/node_modules/codemirror/lib/codemirror.css" />
    <link rel="stylesheet" href="path-to/node_modules/codemirror/theme/ambiance.css" /><!--Choose a theme you wish--></textarea>
                          <p> Add the following script files in &lt;body&gt;. </p>
                          <textarea class="multiple-codes">
    <script src="path-to/node_modules/codemirror/lib/codemirror.js"></script>
    <script src="path-to/node_modules/codemirror/mode/javascript/javascript.js"></script></textarea>
                          <p> Here is an example of an editor using CodeMirror. </p>
                          <textarea class="multiple-codes">
    <textarea rows="4" cols="50" name="code-editable" id="code-editable">
      <script>
      var x = 3;
      var y = 4;
      var z = x + y;
      </script>
    &lt;/textarea&gt;
    
    <script>
      var editableCodeMirror = CodeMirror.fromTextArea(document.getElementById('code-editable'), {
          mode: "javascript",
          theme: "ambiance",
          lineNumbers: true
      });
    </script></textarea>
                        </div>
                        <!--  CodeMirror Ends -->
                      </div>
                      <!--Form editors ends-->
                    </div> <!-- Card Block Ends Here -->
                  </div>
                </div>
                <div class="col-12 grid-margin credits" id="credits">
                  <div class="card">
                    <div class="card-body">
                      <h3 class="mb-4">Credits</h3>
                      <p>We have used the following plugins in Purple admin</p>
                      <div class="row">
                        <div class="col-12 col-md-6">
                          <ul class="credit-list">
                            <li>
                              <p>Ace editor</p> <a href="https://ace.c9.io/" target="_blank">https://ace.c9.io/</a>
                            </li>
                            <li>
                              <p>Bootstrap</p> <a href="https://getbootstrap.com/" target="_blank">https://getbootstrap.com/</a>
                            </li>
                            <li>
                              <p>Bootstrap Datepicker</p> <a href="https://gitter.im/uxsolutions/bootstrap-datepicker" target="_blank">https://gitter.im/uxsolutions/bootstrap-datepicker</a>
                            </li>
                            <li>
                              <p>Bootstrap Maxlength</p> <a href="http://mimo84.github.com/bootstrap-maxlength" target="_blank">http://mimo84.github.com/bootstrap-maxlength</a>
                            </li>
                            <li>
                              <p>C3</p> <a href="https://travis-ci.org/c3js/c3" target="_blank">https://travis-ci.org/c3js/c3</a>
                            </li>
                            <li>
                              <p>Chart.js</p> <a href="https://www.chartjs.org/" target="_blank">https://www.chartjs.org/</a>
                            </li>
                            <li>
                              <p>Chartist</p> <a href="https://gionkunz.github.io/chartist-js/" target="_blank">https://gionkunz.github.io/chartist-js/</a>
                            </li>
                            <li>
                              <p>Clipboard</p> <a href="https://clipboardjs.com" target="_blank">https://clipboardjs.com</a>
                            </li>
                            <li>
                              <p>Codemirror</p> <a href="https://codemirror.net/" target="_blank">https://codemirror.net/</a>
                            </li>
                            <li>
                              <p>Colcade</p> <a href="https://github.com/desandro/colcade" target="_blank">https://github.com/desandro/colcade/</a>
                            </li>
                            <li>
                              <p>D3</p> <a href="https://d3js.org" target="_blank">https://d3js.org</a>
                            </li>
                            <li>
                              <p>Datatables.net</p> <a href="https://datatables.net/" target="_blank">https://datatables.net/</a>
                            </li>
                            <li>
                              <p>Dragula</p> <a href="https://bevacqua.github.io/dragula/" target="_blank">https://bevacqua.github.io/dragula/</a>
                            </li>
                            <li>
                              <p>Dropify</p> <a href="http://jeremyfagis.github.io/dropify/" target="_blank">http://jeremyfagis.github.io/dropify/</a>
                            </li>
                            <li>
                              <p>Dropzone</p> <a href="http://www.dropzonejs.com/" target="_blank">http://www.dropzonejs.com/</a>
                            </li>
                            <li>
                              <p>Flag icons</p> <a href="http://lipis.github.io/flag-icon-css/" target="_blank">http://lipis.github.io/flag-icon-css/</a>
                            </li>
                            <li>
                              <p>Flot</p> <a href="https://www.flotcharts.org/" target="_blank">https://www.flotcharts.org/</a>
                            </li>
                            <li>
                              <p>Font awesome</p> <a href="https://fontawesome.com/" target="_blank">https://fontawesome.com/</a>
                            </li>
                            <li>
                              <p>Full calendar</p> <a href="https://fullcalendar.io/" target="_blank">https://fullcalendar.io/</a>
                            </li>
                            <li>
                              <p>Gulp</p> <a href="https://gulpjs.com/" target="_blank">https://gulpjs.com/</a>
                            </li>
                            <li>
                              <p>Icheck</p> <a href="http://icheck.fronteed.com/" target="_blank">http://icheck.fronteed.com/</a>
                            </li>
                            <li>
                              <p>Inputmask</p> <a href="http://robinherbots.github.io/Inputmask/" target="_blank">http://robinherbots.github.io/Inputmask/</a>
                            </li>
                            <li>
                              <p>Ion range slider</p> <a href="http://ionden.com/a/plugins/ion.rangeSlider/en.php" target="_blank">http://ionden.com/a/plugins/ion.rangeSlider/en.php</a>
                            </li>
                            <li>
                              <p>JQuery</p> <a href="https://jquery.com/" target="_blank">https://jquery.com/</a>
                            </li>
                            <li>
                              <p>JQuery asColorPicker</p> <a href="https://github.com/thecreation/jquery-asColorPicker" target="_blank">https://github.com/thecreation/jquery-asColorPicker</a>
                            </li>
                            <li>
                              <p>JQuery bar rating</p> <a href="http://antenna.io/demo/jquery-bar-rating/examples/" target="_blank">http://antenna.io/demo/jquery-bar-rating/examples/</a>
                            </li>
                            <li>
                              <p>JQuery context menu</p> <a href="http://swisnl.github.io/jQuery-contextMenu/" target="_blank">http://swisnl.github.io/jQuery-contextMenu/</a>
                            </li>
                            <li>
                              <p>JQuery file upload</p> <a href="http://hayageek.com/docs/jquery-upload-file.php" target="_blank">http://hayageek.com/docs/jquery-upload-file.php</a>
                            </li>
                            <li>
                              <p>JQuery Mapael</p> <a href="https://github.com/neveldo/mapael-maps" target="_blank">https://github.com/neveldo/mapael-maps</a>
                            </li>
                            <li>
                              <p>JQuery sparklin</p> <a href="http://omnipotent.net/jquery.sparkline/" target="_blank">http://omnipotent.net/jquery.sparkline/</a>
                            </li>
                            <li>
                              <p>JQuery-steps</p> <a href="http://www.jquery-steps.com/" target="_blank">http://www.jquery-steps.com/</a>
                            </li>
                            <li>
                              <p>JQuery Tags Input</p> <a href="http://xoxco.com/projects/code/tagsinput/" target="_blank">http://xoxco.com/projects/code/tagsinput/</a>
                            </li>
                          </ul>
                        </div>
                        <div class="col-12 col-md-6">
                          <ul class="credit-list">
                            <li>
                              <p>JQuery Toast</p> <a href="https://kamranahmed.info/toast" target="_blank">https://kamranahmed.info/toast</a>
                            </li>
                            <li>
                              <p>JQuery Validation</p> <a href="https://jqueryvalidation.org/" target="_blank">https://jqueryvalidation.org/</a>
                            </li>
                            <li>
                              <p>JQuery Avgrund</p> <a href="https://github.com/voronianski/jquery.avgrund.js" target="_blank">https://github.com/voronianski/jquery.avgrund.js</a>
                            </li>
                            <li>
                              <p>JQuery Repeater</p> <a href="http://briandetering.net/repeater" target="_blank">http://briandetering.net/repeater</a>
                            </li>
                            <li>
                              <p>JSgrid</p> <a href="http://js-grid.com/" target="_blank">http://js-grid.com/</a>
                            </li>
                            <li>
                              <p>JSgrid</p> <a href="http://js-grid.com/" target="_blank">http://js-grid.com/</a>
                            </li>
                            <li>
                              <p>Justgage</p> <a href="http://justgage.com/" target="_blank">http://justgage.com/</a>
                            </li>
                            <li>
                              <p>JVector Map</p> <a href="http://jvectormap.com/" target="_blank">http://jvectormap.com/</a>
                            </li>
                            <li>
                              <p>Light gallery</p> <a href="http://sachinchoolur.github.io/lightGallery/" target="_blank">http://sachinchoolur.github.io/lightGallery/</a>
                            </li>
                            <li>
                              <p>Material Design Icons</p> <a href="https://materialdesignicons.com/" target="_blank">https://materialdesignicons.com/</a>
                            </li>
                            <li>
                              <p>Moment.js</p> <a href="https://momentjs.com/" target="_blank">https://momentjs.com/</a>
                            </li>
                            <li>
                              <p>Morris.js</p> <a href="https://momentjs.com/" target="_blank">https://momentjs.com/</a>
                            </li>
                            <li>
                              <p>NoUISlider</p> <a href="https://refreshless.com/nouislider/" target="_blank">https://refreshless.com/nouislider/</a>
                            </li>
                            <li>
                              <p>Owl carousel</p> <a href="https://owlcarousel2.github.io/OwlCarousel2/docs/started-welcome.php" target="_blank">https://owlcarousel2.github.io/OwlCarousel2/docs/started-welcome.php</a>
                            </li>
                            <li>
                              <p>Perfect scrollbar</p> <a href="http://utatti.github.io/perfect-scrollbar/" target="_blank">http://utatti.github.io/perfect-scrollbar/</a>
                            </li>
                            <li>
                              <p>Popper.js</p> <a href="https://popper.js.org/" target="_blank">https://popper.js.org/</a>
                            </li>
                            <li>
                              <p>Progressbar.js</p> <a href="https://progressbarjs.readthedocs.io/en/latest/" target="_blank">https://progressbarjs.readthedocs.io</a>
                            </li>
                            <li>
                              <p>PWS Tabs</p> <a href="https://alexchizhov.com/pwstabs/" target="_blank">https://alexchizhov.com/pwstabs/</a>
                            </li>
                            <li>
                              <p>Quill Editor</p> <a href="https://quilljs.com/" target="_blank">https://quilljs.com/</a>
                            </li>
                            <li>
                              <p>Rapheal</p> <a href="http://dmitrybaranovskiy.github.io/raphael/" target="_blank">http://dmitrybaranovskiy.github.io/raphael/</a>
                            </li>
                            <li>
                              <p>Select 2</p> <a href="https://select2.org/" target="_blank">https://select2.org/</a>
                            </li>
                            <li>
                              <p>Simple line icons</p> <a href="http://simplelineicons.com/" target="_blank">http://simplelineicons.com/</a>
                            </li>
                            <li>
                              <p>SimpleMDE</p> <a href="https://simplemde.com/" target="_blank">https://simplemde.com/</a>
                            </li>
                            <li>
                              <p>Summernote</p> <a href="https://summernote.org/" target="_blank">https://summernote.org/</a>
                            </li>
                            <li>
                              <p>Sweetalert</p> <a href="http://sweetalert.js.org" target="_blank">http://sweetalert.js.org</a>
                            </li>
                            <li>
                              <p>Tempusdominus-bootstrap-4</p> <a href="https://tempusdominus.github.io/bootstrap-4/" target="_blank">https://tempusdominus.github.io/bootstrap-4/</a>
                            </li>
                            <li>
                              <p>Themify icons</p> <a href="https://themify.me/themify-icons" target="_blank">https://themify.me/themify-icons</a>
                            </li>
                            <li>
                              <p>TinyMCE</p> <a href="https://www.tiny.cloud/" target="_blank">https://www.tiny.cloud/</a>
                            </li>
                            <li>
                              <p>TWBS pagination</p> <a href="https://esimakin.github.io/twbs-pagination/" target="_blank">https://esimakin.github.io/twbs-pagination/</a>
                            </li>
                            <li>
                              <p>Typeahead</p> <a href="https://twitter.github.io/typeahead.js/" target="_blank">https://twitter.github.io/typeahead.js/</a>
                            </li>
                            <li>
                              <p>Xeditable</p> <a href="https://vitalets.github.io/x-editable/" target="_blank">https://vitalets.github.io/x-editable/</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script src="/vendors/codemirror/codemirror.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.45.0/mode/ruby/ruby.min.js"></script>
      <script src="/vendors/pwstabs/jquery.pwstabs.min.js"></script>
      <script src="script.js"></script>
  </body>
</html>