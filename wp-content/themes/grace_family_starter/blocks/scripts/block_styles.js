wp.blocks.registerBlockStyle('core/heading', {
  name: 'has-shadow--grey',
  label: 'Text Shadow (Grey)'
});

wp.blocks.registerBlockStyle('core/paragraph', {
  name: 'has-shadow--grey',
  label: 'Text Shadow (Grey)'
});

const buttonBlockStyles = [
  {
    name: 'primary',
    label: 'Primary Color',
    isDefault: true
  },
  {
    name: 'secondary',
    label: 'Secondary Color'
  },
  {
    name: 'tertiary',
    label: 'Tertiary Color'
  },
  {
    name: 'black',
    label: 'Black Color'
  },
  {
    name: 'dark-grey',
    label: 'Dark Grey'
  },
  {
    name: 'medium-grey',
    label: 'Medium Grey'
  },
  {
    name: 'light-grey',
    label: 'Light Grey'
  }
];

buttonBlockStyles.forEach(style => {
  wp.blocks.registerBlockStyle('core/button', style);
})