CKEDITOR.editorConfig = function( config ) {
    config.toolbar = [
      { name: 'tools0', items : [ 'Undo','Redo','-','Cut','Copy','Paste'] },  
      { name: 'tools1', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript'] },
      { name: 'tools2', items : [ 'NumberedList','BulletedList' ] },
      { name: 'tools4', items : [ 'Table','-','HorizontalRule','-','SpecialChar' ] },
      { name: 'tools5', items : [ 'Styles'] },
      { name: 'tools6', items : [ 'Format'] },
      { name: 'tools3', items : [ 'Maximize'] },
    ];    
    config.defaultLanguage  = 'pt' ;
    // outras cores:  #cfce63    908181 
    config.uiColor = '#cccccc';
	config.format_tags = 'p;h1;h2;h3;pre';
};
