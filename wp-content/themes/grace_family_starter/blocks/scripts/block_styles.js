wp.blocks.registerBlockStyle('core/heading', {
  name: 'page-section_title',
  label: 'Page Section Title',
  isDefault: true
});

const buttonBlockStyles = [
  {
    name: 'primary',
    label: 'Primary Color',
    isDefault: true
  },
  {
    name: 'secondary',
    label: 'Secondary Color',
    isDefault: true
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