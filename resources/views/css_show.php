<?php $__env->startSection('content'); ?>
<h1>H1</h1>
<h2>H2</h2>

<div class="page-wrapper alert-info">
  <div class="content">
    <pre>&lt;div class=&quot;page-wrapper alert-info&quot;&gt;
  &lt;div class=&quot;content&quot;&gt;
    Message d'information
  &lt;/div&gt;
&lt;/div&gt;</pre>
  </div>
</div>

<div class="page-wrapper alert-error">
  <div class="content">
    <pre>&lt;div class=&quot;page-wrapper alert-error&quot;&gt;
  &lt;div class=&quot;content&quot;&gt;
    Message important
  &lt;/div&gt;
&lt;/div&gt;</pre>
  </div>
</div>

<div class="page-wrapper">
  <div class="content">
    <pre><?php echo htmlentities('<div class="page-wrapper">
  <div class="content">
    Simple content block
  </div>
</div>')?></pre>
  </div>
</div>

<div class="page-wrapper dashboard-empty">
	<div class="center w50">
    <pre><?php echo htmlentities('<div class="page-wrapper dashboard-empty">
  <div class="center w50">
    Nice to use for empty resultsets
  </div>
</div>');?></pre>
  </div>
</div>

<h2>Formulaires</h2>
<div class="flex-container page-wrapper">
  <div class="flex-item-fluid content">
    <div class="grid has-gutter">
      <div class="one-half">
        <?php echo Form::label('first_name', 'Prénom'); ?>

        <?php echo Form::text('first_name', null, ['placeholder'=>'Jean', 'required'=>true]); ?>

      </div>
      <div class="one-half">
        <?php echo Form::label('last_name', 'Nom'); ?>

        <?php echo Form::text('last_name', null, ['placeholder'=>'Dupond', 'required'=>true]); ?>

      </div>
    </div>
    <label for="the_item" class="input">
      <?php echo Form::input('checkbox', 'field_name', true, ['id'=>'field_name']); ?>

      The label
    </label>
  <pre>&lt;div class=&quot;flex-container page-wrapper&quot;&gt;
  &lt;div class=&quot;flex-item-fluid content&quot;&gt;
    &lt;div class=&quot;grid has-gutter&quot;&gt;
      &lt;div class=&quot;one-half&quot;&gt;
        {!! Form::label(&#039;first_name&#039;, &#039;Pr&eacute;nom&#039;) !!}
        {!! Form::text(&#039;first_name&#039;, null, [&#039;placeholder&#039;=&gt;&#039;Jean&#039;, &#039;required&#039;=&gt;true]) !!}
      &lt;/div&gt;
      &lt;div class=&quot;one-half&quot;&gt;
        {!! Form::label(&#039;last_name&#039;, &#039;Nom&#039;) !!}
        {!! Form::text(&#039;last_name&#039;, null, [&#039;placeholder&#039;=&gt;&#039;Dupond&#039;, &#039;required&#039;=&gt;true]) !!}
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;label for=&quot;the_item&quot; class=&quot;input&quot;&gt;
      {!! Form::input(&#039;checkbox&#039;, &#039;field_name&#039;, true, [&#039;id&#039;=&gt;&#039;field_name&#039;]) !!}
      The label
    &lt;/label&gt;
  &lt;/div&gt;
  &lt;aside class=&quot;w20 menu-second&quot;&gt;
      {!! Form::submit(&#039;Enregistrer&#039;, [&#039;class&#039;=&gt;&#039;primary&#039;]) !!}
  &lt;/aside&gt;
&lt;/div&gt;</pre>
  </div>
  <!-- Additionnal aside -->
  <aside class="w20 menu-second">
      <?php echo Form::submit('Enregistrer', ['class'=>'primary']); ?>

  </aside>
  <!-- /Additionnal aside -->
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/'.$source, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
