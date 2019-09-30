// import fontawesome from '@fortawesome/fontawesome';
// import faCaretUp from '@fortawesome/fontawesome-free-solid/faCaretUp';
// import faCaretDown from '@fortawesome/fontawesome-free-solid/faCaretDown';
// import faStar from '@fortawesome/fontawesome-free-solid/faStar';
// import faCheck from '@fortawesome/fontawesome-free-solid/faCheck';


// fontawesome.library.add([faCaretUp,faCaretDown,faStar,faCheck]);

import { library, dom } from '@fortawesome/fontawesome-svg-core';
import { faCaretUp } from '@fortawesome/free-solid-svg-icons/faCaretUp';
import { faCaretDown } from '@fortawesome/free-solid-svg-icons/faCaretDown';
import { faStar } from '@fortawesome/free-solid-svg-icons/faStar';
import { faCheck } from '@fortawesome/free-solid-svg-icons/faCheck';

library.add(faCaretUp, faCaretDown, faStar, faCheck)

// Kicks off the process of finding <i> tags and replacing with <svg>
dom.watch()